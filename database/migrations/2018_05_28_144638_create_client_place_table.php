<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_place', function (Blueprint $table) {
            $table->integer('client_id');
            $table->integer('place_id');
            $table->string('geo_relationship');
            /**
             * 'areaServed' will reference the outer containing boundary in geoJson.
             * A client will have at least one areaServed but could have multiple.
             * Places relate to other places and clients can use the following, in addition:
             * prefer: within, contains, crosses (trails, rivers), overlaps, touches, adjacent
             * from: http://schema.org/Place & https://en.wikipedia.org/wiki/DE-9IM
             */
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
        Schema::dropIfExists('client_place');
    }
}
