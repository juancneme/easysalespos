<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConnections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('connections', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('connection_id');
		    $table->string('name', 45)->default(null);
		    $table->string('url', 255)->default(null);
		    $table->string('class', 255)->default(null);
		    $table->string('cube', 45)->default(null);
		    $table->string('user', 50)->nullable()->default(null);
		    $table->string('password', 100)->nullable()->default(null);
		    $table->boolean('status')->default(null);
		
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
		Schema::drop('connections');
    }
}
