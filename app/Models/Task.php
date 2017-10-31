<?php

namespace App\Models;


// use Slim\Views\Twig as View;
// use Interop\Container\ContainerInterface;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';
    protected $fillable = ['task'];

    public $timestamps = [];



}