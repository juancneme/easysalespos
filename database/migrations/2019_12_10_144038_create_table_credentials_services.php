<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCredentialsServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('credentials_services', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->string('user_name',50)->nullable();
            $table->string('password',50)->nullable();
            $table->string('key',50)->nullable();
            $table->string('url_service',100);
            $table->integer('provider')->unsigned();// llave foranea de una lista
            $table->foreign('provider')->references('id')->on('lists');
            $table->integer('company_id')->unsigned(); // llave foranea a la tabla companies
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('type_url',100);
            $table->string('access_token')->nullable();

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
        Schema::dropIfExists('credentials_services');
    }
}
