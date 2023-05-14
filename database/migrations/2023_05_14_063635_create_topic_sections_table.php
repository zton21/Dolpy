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
        Schema::create('topic_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projectID');
            $table->foreignId('userID');
            $table->string('topicName');
            $table->date('topicDate');
            $table->timestamps();

            $table->foreign('projectID')->references('id')->on('project_headers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_sections');
    }
};
