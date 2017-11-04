<?php
/*
 * Other Controller that using Container
 * should extends this BaseController
 */

namespace App\Controllers;
use Slim\Views\Twig as View;
use Interop\Container\ContainerInterface;

use Illuminate\Database\Capsule\Manager as DB;


class BaseController
{
    protected $c;



    public function __construct(ContainerInterface $container)
    {
        $this->c = $container;
  


    }

    
}
