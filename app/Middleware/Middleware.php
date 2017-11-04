<?php


namespace App\Middleware;

use Interop\Container\ContainerInterface;


class Middleware
{
    protected $c;


    public function __construct(ContainerInterface $container)
    {
        $this->c = $container;


    }

    

}