<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
            Schema::create('voter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('father_name');
            $table->string('mother_name');
            $table->integer('id_number');
            $table->string('email');
            $table->string('password');
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
        Schema::drop('voter');
    }
}
