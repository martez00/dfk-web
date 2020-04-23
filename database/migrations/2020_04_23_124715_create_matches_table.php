<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('opponent_team_id');
            $table->enum('type',['home', 'away', 'neutral']);
            $table->integer('team_score')->nullable();
            $table->integer('opponent_team_score')->nullable();
            $table->unsignedInteger('season_id');
            $table->unsignedInteger('tournament_id');
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->integer('attendance')->nullable();
            $table->boolean('finished')->default(false);
            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('opponent_team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
