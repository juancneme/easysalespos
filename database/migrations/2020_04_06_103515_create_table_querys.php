<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuerys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('querys', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('query_id');
			$table->integer('parent_id')->default(null);
			
			$table->integer('cube_id')->unsigned()->default(null);
		    $table->foreign('cube_id')->references('cube_id')->on('cubes');
			
		    $table->string('name', 100)->default(null);
		    $table->longText('query')->nullable();
		    $table->longText('configuration');
		    $table->longText('parameters')->nullable()->default(null);
		    $table->integer('level')->default(null);
		    $table->integer('next')->default(null);
		    $table->integer('position')->default(null);
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
		Schema::drop('querys');
    }
}
