<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    const DRIVER_TYPE = 'facebook';

    public function handleFacebookRedirect(){
       return Socialite::driver(static::DRIVER_TYPE)->redirect();
    }

    public function handleFacebookCallback(){
    
            $user = Socialite::driver(static::DRIVER_TYPE)->stateless()->user();
            $userExisted = User::where('oauth_id',$user->id)->where('oauth_type',static::DRIVER_TYPE)->first();
            if ($userExisted) {
                Auth::login($userExisted);
                return redirect()->route('home');
            }else{
                $name = explode(" ", $user->name);
                $firstname = $name[0];
                $lastname = $name[1];
                $newUser = User::create([
                    'first_name' => $firstname,
                    'last_name' => $lastname,
                    'email'=>$user->email,
                    'oauth_id'=>$user->id,
                    'oauth_type'=> static::DRIVER_TYPE,
                    'password'=> Hash::make($user->id),
                    'email_verified_at' => now(),
                ]);
                Auth::login($newUser);
                return redirect()->route('home');
            }
           
    }
}
