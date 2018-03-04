<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('email')->unique();
            $table->string('given_name');
            $table->string('family_name');
            $table->string('phone_m')->nullable();
            $table->string('phone_h')->nullable();
            $table->string('phone_w')->nullable();
            $table->string('phone_prefs')->nullable();
            $table->string('street_address')->nullable();
            $table->string('address_locality')->nullable();
            $table->string('address_region')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('avatar_url')->nullable();
            $table->date('birth_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
