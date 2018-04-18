<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_comments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('case_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->longText('comment_content')->nullable();
            //$table->text('comment_title');
            //$table->dateTime('comment_date');
            $table->timestamps();
        });

        Schema::table('case_comments', function (Blueprint $table){

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
        Schema::dropIfExists('case_comments');
    }
}
