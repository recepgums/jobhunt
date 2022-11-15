<?php

namespace App\Http\Controllers;


use App\Models\City;
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

                return redirect()->route('register-user')->with(['error' => 'Giriş yapılamadı']);
            }

        } catch (Exception $exception) {
            return redirect()->route('login')->with(['error' => 'Giriş yapılamadı. '. $exception->getMessage()]);
        }
    }

    public function show(User $user)
    {
        $cities = City::select('id', 'name')->get();

        if ($user->hasRole('employee')){
            $jobs = $user->jobs()->orderByDesc('created_at')->limit(4)->get();

            return view('employers.show',compact('user','jobs','cities'));
        }

        return view('candidates.show',compact('user','cities'));
    }

}
