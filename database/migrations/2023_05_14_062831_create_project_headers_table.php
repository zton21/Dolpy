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
        Schema::create('project_headers', function (Blueprint $table) {
            $table->id();
            $table->string('projectName');
            $table->date('projectDueDate');
            $table->text('projectDescription')->nullable();
            $table->string('projectStatus');
            $table->string('projectWallpaperURL');
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
        Schema::dropIfExists('project_headers');
    }
};
