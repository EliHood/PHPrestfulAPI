<?php

namespace App\Auth;




use App\Models\User;

class Auth
{


	public function attempt($username, $password)
	{
		$user = User::where('username', $username)->first();

		if(!$user)
		{
			return false;
		}

		if(password_verify($password, $user->password))
		{
			$_SESSION['user'] =  $user->user_id;
			return true; 
		}


		return false;
	}

	public function user()
	{
		if(isset($_SESSION['user']))
		{
			return User::find($_SESSION['user']);
		}
	}

	public function check()
	{
		if(isset($_SESSION['user']))
		{
			return isset ($_SESSION['user']);
		}
	}

	public function logout()
	{
		unset($_SESSION['user']);
	}
}