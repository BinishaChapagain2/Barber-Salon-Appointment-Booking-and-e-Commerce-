<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
            ]
        );

        Auth::login($user);
        // if user dont have phone number and address then redirect to profile page
        if (empty($user->phone) || empty($user->address)) {
            return redirect()->route('profile.edit', $user->id)->with('success', 'Login successful please update your profile to continue Make sure to update your phone number and address');
        }
        return redirect()->route('homepage')->with('success', 'Login successful');
    }
}
