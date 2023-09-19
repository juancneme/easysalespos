<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCounterscontrol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters_control', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');

            $table->integer('type_transaction')->unsigned();
            $table->foreign('type_transaction')->references('id')->on('lists');

            $table->integer('contract_id')->unsigned()->nullable();
            $table->foreign('contract_id')->references('id')->on('contracts');

            $table->integer('companies_id')->unsigned();
            $table->foreign('companies_id')->references('id')->on('companies');

            $table->string('pre_value',100);
            $table->double('value_counter');
            $table->string('post_value',100);

            $table->datetime('start_validity')->nullable();
            $table->datetime('end_validity')->nullable();
            $table->string('official_text',100)->nullable();

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
        //
    }
}
