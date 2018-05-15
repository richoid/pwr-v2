<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientpostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientpost', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id'); //if 0, all
            $table->integer('user_id');
            $table->integer('post_id');
            $table->string('post_type');
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
        Schema::dropIfExists('clientpost');
    }
}
