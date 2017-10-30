<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;


class HomeController extends BaseController
{
	
	public function index($request, $response)
	{
		return $this->c->view->render($response, 'home.twig');
	}

	public function addTask($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO tasks (task) VALUES (:task)";
        $sth = $this->db->prepare($sql);
        $sth->bindParam("task", $input['task']);
        $sth->execute();
        $input['id'] = $this->db->lastInsertId();
        return $response->withJson($input)->withRedirect('/todos');
   	}
}