<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned()-> index()-> nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade');
            $table->string('title');
            $table->string('type',10);
            $table->string('slug');
            $table->text('body');
            $table->text('videos')->nullable();
            $table->text('videoUrl')->nullable();
            $table->string('tags');
            $table->string('time',15)->default('00:00:00');
            $table->integer('number');
            $table->string('view_count')->default(0);
            $table->string('comment_count')->default(0);
            $table->string('download_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
