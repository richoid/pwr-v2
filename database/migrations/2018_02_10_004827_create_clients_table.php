<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clients table
 */

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_short');
            $table->string('client_name');
            $table->string('parent_org');
            $table->string('client_contact_id'); // user_id
            $table->datetime('license_start_date');
            $table->datetime('license_expire_date');
            $table->boolean('client_status');
            $table->string('client_phone');
            $table->string('street_address');
            $table->string('address_locality'); // city
            $table->string('address_region');   // state
            $table->string('postal_code');      // zip
            $table->integer('area_served');      // place_id (see schema.org)
            $table->string('map_zoom_level', 3)->default('13')->nullable;
            $table->string('bound_kml_url', 255)->nullable;
            $table->string('time_zone', 100)->nullable;
            $table->boolean('require_reg')->default('0');
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
        Schema::dropIfExists('clients');
    }
}
