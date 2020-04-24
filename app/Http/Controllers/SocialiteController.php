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
class SocialiteController extends Controller
{
	const REMEMBER_ME = true;

	public function auth($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = $this->findOrCreateUser(Socialite::driver($provider)->user(), $provider);

        Auth::login($user, self::REMEMBER_ME);

        return redirect()->to('/')->with('info',  __('messages.login_success'));
    }

    private function findOrCreateUser(SocialiteUser $user, $provider)
    {
        if ($provider == 'github') {
            $name = $user->getNickname();
        } else {
            $name = $user->getName();
        }

        return User::firstOrCreate(['email' => $user->getEmail()], [
            'name' => $name,
            'google_id' => $user->getId(),
            'email' => $user->getEmail(),
            'password' => bcrypt(Str::random(32)),
        ]);
    }
}
