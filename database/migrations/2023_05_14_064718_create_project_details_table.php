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
        Schema::create('project_details', function (Blueprint $table) {
            $table->foreignId('projectID');
            $table->foreignId('userID');
            $table->string('role');

            $table->primary(['projectID', 'userID']);

            $table->foreign('projectID')->references('projectID')->on('project_headers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('project_details');
    }
};
