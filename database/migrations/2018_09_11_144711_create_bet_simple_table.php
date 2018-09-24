<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetSimpleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet_simple', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event');
            $table->string('sport')->default("Football");
            $table->string('competition');
            $table->date('date_event');
            $table->time('hour_event');
            $table->string('type')->default("Simple");
            $table->string('stake');
            $table->string('cost');
            $table->string('prognosis');
            $table->string('result')->default("En attente");
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
        Schema::drop('bet_simple');

    }
}
