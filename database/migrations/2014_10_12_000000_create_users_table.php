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
            $table->string('first-name');
            $table->string('last-name');
            $table->string('email', 150)->unique();
            $table->string('address');
            $table->required('phone', 50);
            $table->string('password', 250);
            $table->tinyInteger('parent-rol')->unsigned()->default('0');
            $table->tinyInteger('teacher-rol')->unsigned()->default('0');
            $table->tinyInteger('school-rol')->unsigned()->default('0');
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
