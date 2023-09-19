<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->increments('id');
            $table->string("name", 100);

            $table->string('group_name',200)->nullable();
            $table->string('page_name',200)->nullable();

            $table->integer('icon_id')->unsigned();
            $table->foreign('icon_id')->references('id')->on('lists');
            $table->integer('typelabel_id')->unsigned();
            $table->foreign('typelabel_id')->references('id')->on('lists');
            $table->integer('idowner')->unsigned();
            $table->integer('order');
            $table->tinyInteger("status");
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
        Schema::dropIfExists('modules');
    }
}
