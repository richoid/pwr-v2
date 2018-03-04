<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Task migration
 */

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->datetime('due_by');
            $table->integer('priority');
            $table->string('status');
            $table->integer('assigned_by'); // user_id

        // $table->integer('user_id');
        // $table->integer('client_id');
        // $table->integer('activity_id');
        // $table->integer('group_id');
        
            $table->morphs('taskable'); // creates taskable id and type (polymorphic)
                                        // can be assigned to user, group, activity

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
        Schema::dropIfExists('tasks');
    }
}
