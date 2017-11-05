<?php


namespace App\Controllers\Auth;


use App\Controllers\BaseController;

use App\Auth\Auth;

use App\Models\User;




class AuthController extends BaseController
{
	public function addUser($request, $response)
   	{
   		$input = $request->getParsedBody();


   		$sql = new User();
   		$sql->username = $input['username'];
		$options = [
		    'cost' => 12,
		];
   		$sql->password = password_hash($input['password'],PASSWORD_BCRYPT, $options);
   		
		$sql->save();

		return $response->write($sql)->withRedirect('/dashboard');
   	}

   public function getDashboard($request, $response)
   {

      $auth = $this->c->auth->user();

      if(!$auth)
      {
         return $response->withRedirect('/auth/signin');
      }
      return $this->c->view->render($response, 'dashboard.twig');
   }


   public function getSignin($request, $response)
   {
      return $this->c->view->render($response, '/auth/signin.twig');
   }

   public function getSignup($request, $response)
   {
      return $this->c->view->render($response, 'auth/signup.twig');
   }


   public function postSignIn($request, $response)
   {
      $auth = $this->c->auth->attempt(
         $request->getParam('username'),
         $request->getParam('password')
      );

      if(!$auth)
      {
         return $response->withRedirect('auth/signin.twig');
      }

      return $response->withRedirect('/dashboard');
   }


   public function getSignOut($request, $response)
   {
      $this->c->auth->logout();

      return $response->withRedirect('/');
   }






}