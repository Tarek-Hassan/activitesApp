<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schooles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('schoole_name');
            $table->Integer('country_id');
            $table->Integer('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('stage_id');
            // $table->foreign('stage_id')->references('id')->on('stages');
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
        Schema::dropIfExists('schooles');
    }
}
