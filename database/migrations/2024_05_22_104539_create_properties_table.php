<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {

            $table->increments('__pk')->unsigned();
            $table->integer('_fk_location')->unsigned()->nullable();
            $table->string('property_name', 255)->nullable();
            $table->tinyInteger('near_beach')->unsigned()->nullable();
            $table->tinyInteger('accepts_pets')->unsigned()->nullable();
            $table->tinyInteger('sleeps')->unsigned()->nullable();
            $table->tinyInteger('beds')->unsigned()->nullable();
//            $table->foreign('_fk_location')->references('__pk')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
