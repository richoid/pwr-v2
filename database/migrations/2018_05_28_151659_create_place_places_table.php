<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_places', function (Blueprint $table) {
            $table->integer('place_id');
            $table->integer('place_id_related');
            $table->string('geo_relationship');
            /**
             * Places relate to other places (and clients via ClientPlace) can use the following, 
             * simplified: within, contains, crosses (trails, rivers), overlaps, touches, adjacent
             *
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
        Schema::dropIfExists('place_places');
    }
}
