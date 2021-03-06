<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertiesValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('properties_value', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id')->nullable();
            $table->foreign('properties_id')->references('id')->on('properties');
            $table->string('value')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('properties_value');
    }
}
