<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('client_id');
            $table->string('subject');// a Park, A trail, An Agency, ParkWatch Report , Other
            $table->text('body');
            $table->string('visible'); //Positive, Maint, Complaint, Suggestion, other
            $table->morphs('commentable'); //could reference a profile_id, report_id, etc.
                                           // in which case the type would be 'profile', 'report', etc.
                                           // new 'morphs' function creates type and id columns
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
        Schema::dropIfExists('comments');
    }
}
