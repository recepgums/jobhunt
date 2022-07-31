<?php

namespace App\Http\Controllers;


use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function socialiteRedirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function socialiteCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
            $isUser = User::where('email', $user->email)->first();

            if ($isUser) {
                Auth::login($isUser);

                if (Auth::check()){
                    return  redirect()->route('dashboard');
                }
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'profile_image_url' => $user->avatar,
                    'password' => 'test'.rand(0,999999999999999),
                ]);

                Auth::login($createUser);
                if (Auth::check()){
                    return  redirect()->route('dashboard');
                }

                return redirect()->route('login')->with(['error' => 'Giriş yapılamadı']);
            }

        } catch (Exception $exception) {
            return redirect()->route('login')->with(['error' => 'Giriş yapılamadı. '. $exception->getMessage()]);
        }
    }

    public function show(User $user)
    {
        dd($user);
    }

}
