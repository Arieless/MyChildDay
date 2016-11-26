<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email', 150)->unique();
            $table->string('address');
            $table->string('phone', 50);
            $table->string('picture', 100);
            $table->string('password', 250);
            $table->tinyInteger('parentRol')->unsigned()->default('0');
            $table->tinyInteger('teacherRol')->unsigned()->default('0');
            $table->tinyInteger('schoolRol')->unsigned()->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
