<?php


namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\Task;

class TodosController extends BaseController
{

	public function getTodos($request, $response, $args)
	{
		// $sth = $this->db->prepare("SELECT * FROM tasks ORDER BY task");
		// $sth->execute();
 		$todos = Task::all();
     
        return $this->c->view->render($response, 'todos.twig', ['todos' => $todos]);

	}

	public function deleteTodo($request, $response,  $id)
	{
		// $sth = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
  //    $sth->bindParam("id", $args['id']);
        $owl = $id['id'];
        $todos = Task::find($owl);
     //    $todos = $sth->fetchObject();
    	// $url = urlFor($todos);

    	$todos->delete();


      	// return $response->withJson($todos)->withRedirect('/todos');

   
	}

}