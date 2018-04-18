<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_metas', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('case_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('meta_key', 200);
            $table->longText('meta_value')->nullable();
            $table->timestamps();
        });

        Schema::table('case_metas', function (Blueprint $table){

            $table->foreign('case_id')->references('id')->on('case_incedents')->onDelete('cascade'); 
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
        Schema::dropIfExists('case_metas');
    }
}
