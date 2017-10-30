<?php


namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class TodosController extends BaseController
{

	public function getTodos($request, $response, $args)
	{
		$sth = $this->db->prepare("SELECT * FROM tasks ORDER BY task");
		$sth->execute();
 		$todos = $sth->fetchAll();
     
        return $this->c->view->render($response, 'todos.twig', ['todos' => $todos]);

	}

	public function deleteTodo($request, $response, $args)
	{
		$sth = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $todos = $sth->fetchAll();

    
      	return $this->response->withRedirect('/todos');

   
	}

}