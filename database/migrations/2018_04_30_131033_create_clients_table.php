<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('parent_org')->nullable;
            $table->string('client_contact_id')->nullable; // user_id
            $table->datetime('license_start_date')->nullable;
            $table->datetime('license_expire_date')->nullable;
            $table->boolean('client_status')->nullable;
            $table->string('client_phone')->nullable;
            $table->string('street_address')->nullable;
            $table->string('address_locality')->nullable; // city
            $table->string('address_region')->nullable;   // state
            $table->string('postal_code')->nullable;      // zip
            $table->integer('area_served')->nullable;      // place_id (see schema.org)
            $table->boolean('require_reg')->default('0');
            $table->string('brand1')->nullable;
            $table->string('brand2')->nullable;
            $table->string('brand1_size')->nullable;
            $table->string('brand2_size')->nullable;
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
        Schema::dropIfExists('clients');
    }
}
