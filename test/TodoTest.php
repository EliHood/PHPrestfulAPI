<?php



use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;


class TodoTest extends PHPUnit_Framework_TestCase
{

  	protected $app;

  	public function setUp()
  	{
  	 $this->app = new \Slim\App;
  	}

	public function testTodoGetAll() {
	   	 $env = Environment::mock([
	        'REQUEST_METHOD' => 'GET',
	        'REQUEST_URI'    => '/todo',
	      ]);
	    $req = Request::createFromEnvironment($env);
	    $this->app->getContainer()['request'] = $req;
	    $response = $this->app->run(true);
	    $this->assertSame($response->getStatusCode(), 200);
	    $result = json_decode($response->getBody(), true);
	    $this->assertSame($result["message"], "Hello, Todo");
	
	} 


}