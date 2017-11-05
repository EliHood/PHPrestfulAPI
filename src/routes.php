<?php

namespace Src;

use Slim\Http\Request;
use Slim\Http\Response;

use Slim\Http\UploadedFile;
use App\Models\Image;



    

    $app->get('/todos', '\App\Controllers\TodosController:getTodos');
    $app->get('/', '\App\Controllers\HomeController:index');
    $app->post('/todo', '\App\Controllers\HomeController:addTask');
    $app->post('/auth/adduser','\App\Controllers\Auth\AuthController:addUser')->setName('auth.signup');
    $app->get('/dashboard', '\App\Controllers\Auth\AuthController:getDashboard');

    $app->get('/auth/signin', '\App\Controllers\Auth\AuthController:getSignin')->setName('auth.signin');
    $app->post('/auth/signin', '\App\Controllers\Auth\AuthController:postSignin')->setName('auth.login');

    $app->get('/auth/signup', '\App\Controllers\Auth\AuthController:getSignUp')->setName('auth.register');;

    $app->get('/auth/signout', '\App\Controllers\Auth\AuthController:getSignOut')->setName('auth.signout');

    $app->post('/images', function($request, $response, $args) {
        $data = $request->getUploadedFiles();
        $uploadedImage = $data['image'];
        $uploadedImageStream = $uploadedImage->getStream();
        $image = new Image();
        $image->image = $uploadedImageStream->getContents();
        $image->save();

      return $this->response->write($image->toJson());
    });    



   $app->delete('/todo/[{id}]', '\App\Controllers\TodosController:deleteTodo')->setName('deletetask');

    // Retrieve todo with id 
    $app->get('/todo/[{id}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM tasks WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $todos = $sth->fetchObject();
        return $this->response->withJson($todos);
    });
    // Search for todo with given search teram in their name
    $app->get('/todos/search/[{query}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM tasks WHERE UPPER(task) LIKE :query ORDER BY task");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });

    // Update todo with given id
    $app->put('/todo/[{id}]', function ($request, $response, $args) {
        $input = $request->getParsedBody();
        $sql = "UPDATE tasks SET task=:task WHERE id=:id";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("id", $args['id']);
        $sth->bindParam("task", $input['task']);
        $sth->execute();
        $input['id'] = $args['id'];
        return $this->response->withJson($input);
    });

