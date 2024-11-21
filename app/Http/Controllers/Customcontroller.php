<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Customcontroller extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback from Google
    public function handleGoogleCallback()
    {
        try {
          $googleUser = Socialite::driver('google')->stateless()->user();
        //   dd($googleUser);
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => bcrypt('defaultpassword'), // Use a default password, since we rely on Google
                ]
            );

            // Log the user in
            Auth::login($user);
            return redirect()->intended('dashboard'); // Redirect to the dashboard after login

        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Unable to login, try again later.']);
        }
    }
}
