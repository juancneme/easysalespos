<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->string('numbercontract',30);
            
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');

            $table->integer('typecontract_id')->unsigned();
            $table->foreign('typecontract_id')->references('id')->on('lists');
            
            $table->date('startdate');
            $table->date('enddate');
            $table->string('timebilling',100); //periodo de facturacion

            $table->integer('taxregime_id')->unsigned(); //tipo de impuestos
            $table->foreign('taxregime_id')->references('id')->on('lists');
            
            $table->integer('quantitystores');
            $table->integer('quantityusers');
            
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
        Schema::dropIfExists('contracts');
    }
}
