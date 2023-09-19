<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');

            $table->integer('type_id')->unsigned(); //mail o telefono
            $table->foreign('type_id')->references('id')->on('lists');
            
            $table->integer('typecontact_id')->unsigned(); //personal laboraral etc
            $table->foreign('typecontact_id')->references('id')->on('lists');
            
            $table->string('textcontact')->length(250); //emailñ o nuimeros de telefonos

            $table->tinyinteger('default');
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
        Schema::dropIfExists('contacts');
    }
}
