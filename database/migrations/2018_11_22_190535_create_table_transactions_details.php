<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransactionsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');

            $table->integer('transaction_id')->unsigned();
            $table->foreign('transaction_id')->references('id')->on('transactions');
            
            $table->integer('catalog_product_id')->unsigned();
            $table->foreign('catalog_product_id')->references('id')->on('catalog_products');

            $table->integer('quantity');
            $table->float('unit_price',14,2);
            $table->float('iva_value',14,2);
            $table->float('total_value',14,2);

            $table->string('lot_number');
            $table->datetime('expiration_date');
            $table->datetime('fabrication_date');
            
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
        Schema::dropIfExists('transactions_details');
    }
}
