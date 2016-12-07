<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleUserKidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_user_kid', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->integer('kid_id')->unsigned();
            $table->foreign('kid_id')->references('id')->on('kids');
            $table->integer('addedByUser_id')->unsigned();
            $table->foreign('addedByUser_id')->references('id')->on('users');
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->unique('email', 'kid_id');
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
        Schema::dropIfExists('schedule_user_kid');
    }
}
