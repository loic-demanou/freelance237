<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Hash;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     * 
     * @return Response
     */

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        //  dd($user);
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            // 'profile_photo_url' =>$user->picture,
            'name' => $user->name,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);

        return redirect('/dashboard');
        
    }
}
