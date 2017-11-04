<?php

use \Src\Migration\Migration;

class MyFirstMigration extends Migration {
    
    public function up()  {
        $this->schema->create('users', function(Illuminate\Database\Schema\Blueprint $table){
            // Auto-increment id 
            $table->increments('user_id');
        
            $table->string('username');
            $table->string('password');

            // Required for Eloquent's created_at and updated_at columns 
            $table->timestamps();
        });
    }
    public function down()  {
        $this->schema->drop('users');
    }



}