<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draw_vote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('draw_id')->unsigned()->default('1');
            $table->foreign('draw_id')->references('id')->on('draws')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('vote_id')->unsigned()->default('1');
            $table->foreign('vote_id')->references('id')->on('votes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('draw_vote');
    }
}
