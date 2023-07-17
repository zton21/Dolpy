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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id');
            $table->foreignId('user_id');
            $table->string('attachmentName');
            $table->string('attachmentPath');
            $table->string('attachmentType');
            $table->date('attachmentDate');
            $table->string('attachmentSize');
            $table->string('attachmentExtension');
            
            $table->foreign('file_id')->references('id')->on('file_sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('attachments');
    }
};
