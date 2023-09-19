<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCombination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combination', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            
     	    $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('catalog_id')->unsigned();
            $table->foreign('catalog_id')->references('id')->on('catalogs');
            
            $table->string('name',150);
	        $table->integer('saleprice');
            
            $table->tinyinteger('status')->length(1);
            $table->timestamps();
        });

        // DB :: declaración ("ALTER TABLE libros AUTO_INCREMENT = 10000000;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combination');
    }
}
