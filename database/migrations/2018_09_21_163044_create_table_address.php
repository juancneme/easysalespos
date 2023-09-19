<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('lists');

            $table->integer('deparment_id')->unsigned();
            $table->foreign('deparment_id')->references('id')->on('lists');

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('lists');

            $table->string('location')->length(100);
            $table->string('neighborhood')->length(100);
            $table->string('address')->length(250);
            $table->string('postalcode')->length(100);

            $table->integer('typeaddress_id')->unsigned();
            $table->foreign('typeaddress_id')->references('id')->on('lists');
            
            $table->string('latitudecode')->length(100);
            $table->string('lengthcode')->length(100);
            $table->string('altitudecode')->length(100);
            
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
        Schema::dropIfExists('address');
    }
}
