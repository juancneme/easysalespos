<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatalogProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            
            $table->integer('catalog_id')->unsigned();
            $table->foreign('catalog_id')->references('id')->on('catalogs');

            $table->string('name',200);
            
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            
            $table->integer('salesunit_id')->unsigned();  //unidad peso otros
            $table->foreign('salesunit_id')->references('id')->on('lists');
            
            $table->float('purchaseprice');
            $table->float('saleprice');
            $table->string('barcode',150);

            $table->integer('products_taxe_id')->unsigned();
            $table->foreign('products_taxe_id')->references('id')->on('products_taxes');

            $table->string('image', 100);
            $table->string('image_temporary', 100);

            $table->tinyinteger('status')->length(1);
            $table->timestamps();
        });

        // DB :: declaración ("ALTER TABLE libros AUTO_INCREMENT = 30000000;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_products');
    }
}
