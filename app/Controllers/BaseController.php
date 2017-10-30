<?php
/*
 * Other Controller that using Container
 * should extends this BaseController
 */

namespace App\Controllers;
use Slim\Views\Twig as View;
use Interop\Container\ContainerInterface;

class BaseController
{
    protected $c;
    public $db;

    public function __construct(ContainerInterface $container)
    {
        $this->c = $container;
        $this->db = $container['db'];

    }
}
