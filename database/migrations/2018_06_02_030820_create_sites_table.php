<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('site_name')->nullable();
            $table->string('thana')->nullable();
            $table->string('district')->nullable();
            $table->string('service_center')->nullable();
            $table->string('zone')->nullable();
            $table->string('region')->nullable();  
            $table->string('cluster')->nullable();
            $table->string('distance')->nullable(); 
            $table->string('priority')->nullable();
            $table->string('address')->nullable();
            $table->string('category')->nullable();
            $table->decimal('longitude', 8, 6)->nullable();
            $table->decimal('latitude', 8, 6)->nullable();
            $table->string('type')->nullable();  
            $table->string('location')->nullable();
            $table->string('power')->nullable();
            $table->string('solar')->nullable();
            $table->string('cooling_system')->nullable();  
            $table->string('dg_status')->nullable();
            $table->string('backup_power')->nullable();
            $table->string('dg_brand')->nullable(); 
            $table->string('dg_kva')->nullable();
            $table->string('battery_backup')->nullable();
            $table->string('bbm_plan')->nullable();
            $table->string('power_authority')->nullable();
            $table->string('sub_authority')->nullable();
            $table->string('approx_site_dc_load')->nullable();
            $table->decimal('grid_avaiability_2017_Q1', 4, 2)->nullable(); 
            $table->decimal('grid_avaiability_2017_Q2', 4, 2)->nullable(); 
            $table->decimal('grid_avaiability_2017_Q3', 4, 2)->nullable();
            $table->decimal('grid_avaiability_2017_Q4', 4, 2)->nullable(); 
            $table->decimal('grid_avaiability_2017_yearly', 4, 2)->nullable();
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
        Schema::dropIfExists('sites');
    }
}
