<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('season_tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('season_id');
            $table->unsignedInteger('tournament_id');

            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
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
        Schema::dropIfExists('season_tournaments');
    }
}
