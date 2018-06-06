<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('site_id')->unique();
            $table->string('ticket_number');
            $table->string('ticket_status', 20);
            $table->string('ticket_type', 20);
            $table->string('vendor_name')->nullable();
            $table->string('pg_owner')->nullable();
            $table->dateTime('raised_time');
            $table->bigInteger('assigned_engineer_id')->nullable();
            $table->timestamps();
        });


        Schema::table('tickets', function (Blueprint $table){

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict'); 
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('restrict'); 

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
