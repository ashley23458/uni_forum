<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Socialite;
use App\User;

class GoogleAuthController extends Controller
{
	const REMEMBER_ME = true;

	public function auth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = $this->findOrCreateUser(
            Socialite::driver('google')->user()
        );

        Auth::login($user, self::REMEMBER_ME);

        return redirect(route('comments.index'));
    }

    private function findOrCreateUser(SocialiteUser $googleUser)
    {
        return User::firstOrCreate(['google_id' => $googleUser->getId()], [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(Str::random(32)),
        ]);
    }
}
