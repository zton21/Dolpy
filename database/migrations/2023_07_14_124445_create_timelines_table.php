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
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('timelineTitle');
            $table->text('timelineDesc')->nullable();

            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('project_headers')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('next')->nullable();
            $table->string('group')->default('todo');
            $table->string('type')->default('blue');

            $table->integer('n_task')->default(0);
            $table->integer('completed_task')->default(0);

            $table->date('end_date')->default(date('Y-m-d'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timelines');
    }
};
