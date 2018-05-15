<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('place_id')->nullable();
            $table->string('title');
            $table->text('body')->nullable();
            //$table->string('type'); 
            $table->morphs('postable'); // news, alert, calendar, info

            //dateTime fields will be concatenated in the controller from separate date and time fields
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            //dateTime fields will be concatenated in the controller from separate date and time fields
            $table->dateTime('publish_date')->nullable();
            $table->dateTime('archive_date')->nullable();
            //these correlate with Bootstrap alert classes
            $table->string('alert_level')->nullable();
            $table->string('notify')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
