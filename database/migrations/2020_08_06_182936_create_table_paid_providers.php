<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePaidProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_providers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id'); // llave primaria
            $table->integer('consecutive_transaction'); // llave unica

            $table->integer('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('payment_provider_date'); // campo referente al pago
            $table->integer('payment_provider_status'); // campo referente al pago
            $table->integer('payment_provider_status_detail'); // campo referente al pago
            $table->bigInteger('payment_provider_pay_id'); // CAMPO BIGINT
            $table->string('access_token');

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
        Schema::dropIfExists('paid_providers');
    }
}
