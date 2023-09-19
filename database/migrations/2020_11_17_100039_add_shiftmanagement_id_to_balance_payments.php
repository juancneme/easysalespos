<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShiftmanagementIdToBalancePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balance_payments', function (Blueprint $table) {
            $table->integer('shiftmanagement_id')->unsigned()->after('businesskey');
            $table->foreign('shiftmanagement_id')->references('id')->on('shift_managements');
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
