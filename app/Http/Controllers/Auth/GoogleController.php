<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    const DRIVER_TYPE = 'google';

    public function handleGoogleRedirect(){
       return Socialite::driver(static::DRIVER_TYPE)->redirect();
    }

    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver(static::DRIVER_TYPE)->user();
            $userExisted = User::where('oauth_id',$user->id)->where('oauth_type',static::DRIVER_TYPE)->first();
            if ($userExisted) {
                Auth::login($userExisted);
                return redirect()->route('home');
            }else{
                $newUser = User::create([
                    'first_name' => $user->name,
                    'last_name' => $user->name,
                    'email'=>$user->email,
                    'oauth_id'=>$user->id,
                    'oauth_type'=> static::DRIVER_TYPE,
                    'email_verified_at' => now(),
                    'password'=> Hash::make($user->id),
                ]);
                
                Auth::login($newUser);
            }
        } catch (Exception $e) {
            dd($e);
        }        
    }
}
