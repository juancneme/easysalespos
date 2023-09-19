<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInitialbalanceToShiftManagements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shift_managements', function (Blueprint $table) {
            $table->datetime('enddate')->after('shiftdate');
            $table->integer('initialbalance')->after('enddate');
            $table->integer('calculatedbalance')->after('initialbalance');
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
