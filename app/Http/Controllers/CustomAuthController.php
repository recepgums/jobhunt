<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAttemptRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Jobs\SendMailJob;
use App\Jobs\SendSmsJob;
use App\Mail\VerifyEmailAddressMail;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(LoginAttemptRequest $request)
    {
//        $remember = $request->input('remember');

        if (Auth::attempt($request->validated())) {
            return redirect()->intended('dashboard');
        }

        return redirect()->route("register-user")->with(['error' => 'Giriş bilgileri yanlış']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function customRegistration(UserRegisterRequest $request)
    {
        try {
             $newUser = $this->create($request->validated());
        }catch (\Exception $exception){
            return  \redirect()->back()->withErrors(['errors' => $exception->getMessage()]);
        }

        $phoneVerifyCode = rand(10000,99999);
        $emailVerifyCode = rand(10000,99999);
        UserVerify::create([
            'user_id' => $newUser->id,
            'phone_verify_code' => $phoneVerifyCode,
            'email_verify_code' => $emailVerifyCode,
            'token' => Str::random(20),
        ]);

        if ($newUser->phone)
            SendSmsJob::dispatch($newUser->phone,$phoneVerifyCode . " kodunu kullanarak telefon numaranizi onaylayiniz");
        if ($newUser->email)
            SendMailJob::dispatch($newUser->email, new VerifyEmailAddressMail($phoneVerifyCode));

        return redirect()->route('dashboard')->withSuccess('Giriş yaptınız');
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
        ]);
        $user->setRoleByTypeId($data);


        Auth::login($user);
        return $user;
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard.index', ['user' => \auth()->user()]);
        }

        return redirect()->route('register-user')->withSuccess('You are not allowed to access');
    }

    public function forgotPassword()
    {
       return view('auth.forgotPassword');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('homepage');
    }

    public function changePasswordPost(Request $request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
        //Change Password
        $user = Auth::user();
        $user->password = $request->get('password');
        $user->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }
}
