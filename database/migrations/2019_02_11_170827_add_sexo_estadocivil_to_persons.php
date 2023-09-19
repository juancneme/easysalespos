<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSexoEstadocivilToPersons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->integer('sex_id')->unsigned()->nullable()->after('birthdate');
            $table->foreign('sex_id')->references('id')->on('lists');
            $table->integer('civilstatus_id')->unsigned()->nullable()->after('birthdate');
            $table->foreign('civilstatus_id')->references('id')->on('lists');
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
