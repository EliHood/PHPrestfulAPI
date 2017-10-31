<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\Task;
class HomeController extends BaseController
{
	
	public function index($request, $response)
	{
		return $this->c->view->render($response, 'home.twig');
	}

	public function addTask($request, $response) {
        $input = $request->getParsedBody();
        $sql = new Task();
        $sql->task = $input['task'];
        $sql->save();
        return $response->write($sql->toJson())->withRedirect('/todos');
   	}



 

}