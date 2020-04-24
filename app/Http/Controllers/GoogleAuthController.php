<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Socialite;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use App\User;

/**
 * Jenkins, A. J. University of Huddersfield. (2020). Sample App Final. Retrieved from https://huddersfield.brightspace.com/d2l/le/content/65955/viewContent/518254/View.
 */
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

        return redirect()->to('/')->with('info',  __('messages.login_success'));
    }

    private function findOrCreateUser(SocialiteUser $googleUser)
    {
        return User::firstOrCreate(['email' => $googleUser->getEmail()], [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(Str::random(32)),
        ]);
    }
}
