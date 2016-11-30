<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::enableForeignKeyConstraints();
      Schema::create('rooms', function(Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('school_id')->unsigned();
          $table->foreign('school_id')->references('id')->on('schools');
          $table->profilePicture('name', 100);
          $table->tinyInteger('deactivated')->unsigned()->default('0');
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
        Schema::dropIfExists('rooms');
    }
}
