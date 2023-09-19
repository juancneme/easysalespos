<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCountersControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('counters_control', function (Blueprint $table) {
            $table->string('resolution_number', 100)->nullable()->before('status');
            $table->string('resolution_date', 100)->nullable()->before('status');
            $table->double('initial_value', 100)->nullable()->before('status');
            $table->double('final_value', 100)->nullable()->before('status');
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
