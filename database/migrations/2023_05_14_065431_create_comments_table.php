<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('commentID');
            $table->foreignId('topicID');
            $table->foreignId('userID');
            $table->text('chatContent');
            $table->date('chatDate');
            
            $table->foreign('topicID')->references('topicID')->on('topic_sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comments');
    }
};
