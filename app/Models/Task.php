<?php

namespace App\Models;


// use Slim\Views\Twig as View;
// use Interop\Container\ContainerInterface;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';
    protected $fillable = ['task', 'user_id'];


    public $timestamps = [];


    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

}