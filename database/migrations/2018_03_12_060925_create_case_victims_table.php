<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseVictimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_victims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('case_id')->unsigned();
            $table->text('name');
            $table->text('parents');
            $table->text('districts')->nullable();
            $table->text('location')->nullable();
            $table->integer('age')->unsigned();
            $table->text('sex');
            $table->timestamps();
        });

        Schema::table('case_victims', function (Blueprint $table){

            $table->foreign('case_id')->references('id')->on('case_incedents')->onDelete('cascade'); 

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_victims');
    }
}
