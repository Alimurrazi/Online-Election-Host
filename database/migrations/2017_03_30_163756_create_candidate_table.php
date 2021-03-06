<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */ 
    public function up()
    {
            Schema::create('candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('team');
            $table->string('image'); 
            $table->string('video');
            $table->integer('vote_count')->default(0);
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
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
