<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAttemptRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(LoginAttemptRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->intended('dashboard');
        }

        if ($request->ajax()){
            dd('sds');
        }

        return redirect("login")->with(['error' => 'Giriş bilgileri yanlış']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function customRegistration(Request $request)
    {
        $a = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:7',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Giriş yaptınız');
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
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

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
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
