<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShiftClosure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_closure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turn')->unsigned();
            $table->foreign('turn')->references('id')->on('shift_managements');
            $table->string('record_type',50);
            $table->string('ope_type',50);
            $table->integer('medium_payment_type')->unsigned();
            $table->foreign('medium_payment_type')->references('id')->on('lists');
            $table->integer('input_quantity');
            $table->integer('input_value');
            $table->integer('system_quantity');
            $table->integer('system_value');

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
        //
    }
}
