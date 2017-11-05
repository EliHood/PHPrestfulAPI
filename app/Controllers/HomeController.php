<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\Task;
use App\Models\User;

use App\Auth\Auth;

class HomeController extends BaseController
{
	
	public function index($request, $response)
	{

		
		return $this->c->view->render($response, 'home.twig');

	}

	public function addTask($request, $response) {

		$data = $request->getParsedBody();
		$task = Task::create([
		    'task' => filter_var($data['task'],FILTER_SANITIZE_STRING),   // $request->title also works?
		    'user_id' => Auth::user()->user_id   // there might be a better solution, but this works 100%
		]);


        return $response->write($task->toJson())->withRedirect('/todos');
   	}



 

}