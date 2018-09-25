<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTableBetCombi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet_combi', function (Blueprint $table) {

            $table->increments('id');
            $table->string('event');
            $table->string('sport')->default("Football");
            $table->string('competition');
            $table->date('date_event');
            $table->time('hour_event');
            $table->string('cost_1');
            $table->string('prognosis_1');

            $table->string('event_2');
            $table->string('sport_2')->default("Football");
            $table->string('competition_2');
            $table->date('date_event_2');
            $table->time('hour_event_2');
            $table->string('cost_2');
            $table->string('prognosis_2');

            $table->string('event_3')->nullable();
            $table->string('sport_3')->default("Football")->nullable();
            $table->string('competition_3')->nullable();
            $table->date('date_event_3')->nullable();
            $table->time('hour_event_3')->nullable();
            $table->string('cost_3')->nullable();
            $table->string('prognosis_3')->nullable();

            $table->string('event_4')->nullable();
            $table->string('sport_4')->default("Football")->nullable();
            $table->string('competition_4')->nullable();
            $table->date('date_event_4')->nullable();
            $table->time('hour_event_4')->nullable();
            $table->string('cost_4')->nullable();
            $table->string('prognosis_4')->nullable();


            $table->string('type')->default("Combiné");
            $table->string('stake');
            $table->string('cost');
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
        //
    }
}
