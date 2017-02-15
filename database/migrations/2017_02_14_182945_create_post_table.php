<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 


    public function up()
    {
            Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postname');
            $table->integer('total_post');
            $table->integer('total_candidate');
            $table->integer('election_id')->unsigned();
            $table->foreign('election_id')->references('id')->on('election')->onDelete('cascade');
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
        Schema::drop('post');
    }
}
