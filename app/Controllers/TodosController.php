<?php


namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Illuminate\Database\Capsule\Manager as DB;
use App\Models\Task;

use App\Models\User;



class TodosController extends BaseController
{

	public function getTodos($request, $response, $args)
	{


 		$tasks = Task::with('user')->get();
     
     	return $this->c->view->render($response, 'todos.twig', ['tasks' => $tasks]);

	}

	public function helloWorld()
	{
		return 'hello world';
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


       return $response->withJson($todos)->withRedirect('/todos');

   
	}

}