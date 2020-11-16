<?php


namespace App\Http\Controllers;


use Laravel\Socialite\Facades\Socialite;
use App\Service\Socialite as SocialiteService;

class VkSocialite extends Controller
{
	/**
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function redirectToProvider()
	{
		return Socialite::driver('vkontakte')->redirect();
	}

	/**
	 *
	 */
	public function handleProviderCallback()
	{
		$user = Socialite::driver('vkontakte')->user();
		$objSocialite = new SocialiteService();
		$objSocialite->saveUser($user);

		return redirect()->route('login');
	}
}