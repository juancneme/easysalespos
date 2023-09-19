<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->string('name',200);
            $table->string('shortname',50);
            $table->integer('manufacturer_id')->unsigned();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->integer('order');

            $table->integer('salesunit_id')->unsigned();
            $table->foreign('salesunit_id')->references('id')->on('lists');
            $table->float('purchaseprice');
            $table->float('saleprice');
            $table->string('barcode',150);

            $table->integer('products_taxe_id')->unsigned();
            $table->foreign('products_taxe_id')->references('id')->on('products_taxes');

            $table->integer('products_picture_id')->unsigned();
            $table->foreign('products_picture_id')->references('id')->on('products_pictures');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            
            $table->string('localtaxonomy',100);
            
            $table->tinyinteger('status')->length(1);
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
        Schema::dropIfExists('products');
    }
}
