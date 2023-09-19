<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePersons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->integer('typeperson_id')->unsigned();
            $table->foreign('typeperson_id')->references('id')->on('lists');
            $table->integer('typedocument_id')->unsigned();
            $table->foreign('typedocument_id')->references('id')->on('lists');
            $table->integer('digitcheck')->unsigned()->nullable();
            $table->string('numberdocument')->length(30);
            $table->string('socialreason')->length(250)->nullable();
            $table->string('firstname')->length(100)->nullable();
            $table->string('othernames')->length(100)->nullable();
            $table->string('lastname')->length(100)->nullable();
            $table->string('otherlastname')->length(100)->nullable();
            $table->date('birthdate');
            $table->tinyinteger('status');
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
        Schema::dropIfExists('persons');
    }
}
