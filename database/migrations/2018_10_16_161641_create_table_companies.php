<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');

            $table->integer('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts');
            
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');
            
            $table->string('name',100);
            $table->string('slogan',100);
            $table->string('logo',100);
            
            $table->integer('typecompany_id')->unsigned();
            $table->foreign('typecompany_id')->references('id')->on('lists');
            
            $table->integer('idowner')->unsigned();
            $table->date('startdate');
            $table->date('enddate');
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
        Schema::dropIfExists('companies');
    }
}
