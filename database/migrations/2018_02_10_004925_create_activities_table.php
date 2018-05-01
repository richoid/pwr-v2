<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // user_id of person creating the activity
            $table->integer('client_id');
            $table->string('title');
            $table->text('body');
            //dateTime fields will be concatenated in the controller from separate date and time fields
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('place_id')->nullable();
            $table->string('status')->nullable();
            $table->integer('priority');
            $table->integer('activable_id')->nullable();
            $table->string('activable_type')->nullable()->default('group');
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
        Schema::dropIfExists('activities');
    }
}
