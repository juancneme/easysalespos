<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShiftClosureDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_closure_detail',function (Blueprint $table){

            $table->increments('id');
            $table->integer('turn')->unsigned();
            $table->foreign('turn')->references('id')->on('shift_managements');
            $table->string('denomination',255);
            $table->integer('amount');
            $table->string('record_type',50);
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
