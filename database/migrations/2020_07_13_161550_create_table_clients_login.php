<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClientsLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_login', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
      
            $table->integer('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts');

            $table->string('name',100); //periodo de facturacion
            $table->string('email',150); //periodo de facturacion
            $table->string('password',255); //periodo de facturacion
            $table->string('remember_token',255); //periodo de facturacion

            $table->tinyinteger('status');
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_login');
    }
}
