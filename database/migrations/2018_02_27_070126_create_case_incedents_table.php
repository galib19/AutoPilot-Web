<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseIncedentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_incedents', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('case_title');
            $table->longText('case_details')->nullable();
            $table->string('case_status', 20);
            $table->string('case_type', 20);
            $table->text('action_taken')->nullable();
            $table->dateTime('incident_date');
            $table->longText('incident_info')->nullable();
            $table->timestamps();
        });


        Schema::table('case_incedents', function (Blueprint $table){

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict'); 

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_incedents');
    }
}
