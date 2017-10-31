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

        $options = array(
		    'options' => array(
		        'default' => 3, // value to return if the filter fails
		        // other options here
		        'min_range' => 0
		    ),
		    'flags' => FILTER_FLAG_STRIP_BACKTICK,
		);

        $sql->task = filter_var($input['task'], FILTER_SANITIZE_STRING, $options);


        $sql->save();
        return $response->write($sql->toJson())->withRedirect('/todos');
   	}



 

}