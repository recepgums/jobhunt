<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginAttemptRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Jobs\SendMailJob;
use App\Jobs\SendSmsJob;
use App\Mail\VerifyEmailAddressMail;
use App\Models\UserVerify;
use App\Services\SmsService;
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
        $remember = $request->input('remember');

        if (Auth::attempt($request->validated(),$remember)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with(['error' => 'Giriş bilgileri yanlış']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function phoneVerify()
    {
        if (\auth()->user()->has_verified_phone)
            return  \redirect()->route('candidate.profile');

        return view('auth.phone_verify');
    }

    public function customRegistration(UserRegisterRequest $request)
    {
        try {
             $newUser = $this->create($request->validated());
        }catch (\Exception $exception){
            return  \redirect()->back()->with(['errors' => $exception->getMessage()]);
        }

        $phoneVerifyCode = rand(10000,99999);
        $emailVerifyCode = rand(10000,99999);

        $userVerify = UserVerify::create([
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

    public function customPhoneVerification(Request $request)
    {
        $phoneVerifyCode = rand(1000,9999);
        $emailVerifyCode = rand(10000,99999);
        $user = \auth()->user();

        $userVerify = UserVerify::query()->updateOrCreate([
            'user_id' => $user->id,
        ], [
            'phone_verify_code' => $phoneVerifyCode,
            'email_verify_code' => $emailVerifyCode,
            'token' => Str::random(20),
        ]);

        if ($user->phone)
            SendSmsJob::dispatch($user->phone,$phoneVerifyCode . " kodunu kullanarak telefon numaranizi onaylayiniz");

        return view('auth.phone_verify_code',compact('userVerify'));

    }

    public function customPhoneVerifyCode(Request $request)
    {
        $userVerify = \auth()->user()->verify;

        if ($userVerify->phone_verify_code === $request->get('code')){
            $userVerify->update([
                'phone_verified_at' => now()->toDateTimeString()
                ]);
        }else{
            return view('auth.phone_verify_code',['userVerify' =>null])->with(['errors'=>['Girilen kod yanlış']]);
        }

        return redirect()->intended(route('dashboard'));
    }

    public function create(array $data)
    {
        $user = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
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
            return view('dashboard.index', ['user' => \auth()->user()->load('appliedJobs','jobs')]);
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

    public function changePasswordPost(ChangePasswordRequest $request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Önceki şifreyi yanlış girdiniz");
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "Yeni şifre, eski şifrenizin aynısı olamaz");
        }
        //Change Password
        $user = Auth::user();
        $user->password = $request->get('password');
        $user->save();

        return redirect()->back()->with("success", "Şifre başarıyla güncellendi");
    }

    public function changePasswordByTokenIndex($token)
    {
        User::where('token',$token)->firstOrFail();

        return view('auth.newPassword');
    }

    public function changePasswordByTokenPost(Request $request)
    {
        $user = User::where('token',$request->get('token'))->firstOrFail();

        if (strlen($request->get('password')) < 7)
            return \redirect()->back()->withErrors(['msg' =>'Şifre 7 karakterden fazla olmalıdır.' ]);

        if ($request->get('password') !== $request->get('password_confirmation'))
            return \redirect()->back()->withErrors(['msg' =>'Şifreler aynı değil' ]);

        $user->password = Hash::make($request->get('password'));
        $user->save();

        return \redirect()->route('login');
    }
}
