<?php namespace App\Service;


use App\Models\User;

class Socialite
{
	/**
	 * @param $user
	 * @return bool
	 */
   public function saveUser($user)
   {
	   $email = $user->getEmail();
	   $model = User::where('email', $email)->first();
	   if($model) {
	   	  $user =  $model->saveSocialUser(['email' => $email, 'name' => $user->getName()]);
	   	  //other actions
		   if($user) {
		   	  \Auth::loginUsingId($model->id);
		   }
	   }

	   return true;

	   //register new user
   }
}