<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCubes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('cubes', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
        $table->increments('cube_id');
        
        $table->integer('connection_id')->unsigned()->default(null);
        $table->foreign('connection_id')->references('connection_id')->on('connections');
        
		    $table->string('name', 45)->default(null);
		    $table->integer('status')->default(null);
		
		    $table->timestamps();
		
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('cubes');
    }
}
