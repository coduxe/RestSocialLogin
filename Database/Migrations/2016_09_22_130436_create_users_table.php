<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('email')->unique();
      $table->string('password')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('users');
  }

}
