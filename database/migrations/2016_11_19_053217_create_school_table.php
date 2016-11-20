<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('schools', function(Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('address');
          $table->bigInteger('telephone');
          $table->string('email');
          $table->foreign('administrator_id')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('schools');
    }
}
