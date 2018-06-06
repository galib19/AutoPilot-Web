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
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->boolean('free')->default(1);
            $table->string('password');
            $table->boolean('active');
            $table->dateTime('eta')->nullable();
            $table->integer('ert')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('fcm_token')->nullable();
            $table->string('device')->nullable();
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
