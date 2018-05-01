<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * TODO: relates to place_relationships table
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('lat')->nullable;
            $table->string('long')->nullable;
            $table->json('boundary')->nullable;
            $table->json('path')->nullable;
            $table->string('map_zoom_level', 3)->default('13')->nullable;
            $table->string('bound_kml_url', 255)->nullable;
            $table->string('time_zone', 100)->nullable;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
