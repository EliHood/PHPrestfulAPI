<?php

use \Src\Migration\Migration;

class MySecondMigration extends Migration {
    
    public function up()  {
        $this->schema->create('tasks', function(Illuminate\Database\Schema\Blueprint $table){
            // Auto-increment id 
            $table->increments('id');
            $table->integer('user_id')->unsigned();
        
            $table->string('task');
            // Required for Eloquent's created_at and updated_at columns 
            $table->timestamps();
 
            $table->foreign('user_id')->references('user_id')->on('users'); 




        });


          
     
    }


    public function down()  {
        $this->schema->drop('tasks');
    }



}