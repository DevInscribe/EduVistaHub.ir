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
        Schema::create('courses', function (Blueprint $table) {
            $table-> id();
            $table-> bigInteger('user_id')->unsigned()-> index()-> nullable();
            $table-> foreign('user_id') -> references('id') 
                                       -> on('users') -> onUpdate('cascade') 
                                       -> onDelete('cascade');
            $table-> string('title');
            $table-> string('slug');
            $table-> string('type',10);
            $table-> text('body');
            $table-> string('price',50);
            $table-> string('tags');
            $table-> text('images') -> nullable();
            $table-> string('videos') -> nullable();
            $table-> string('time',15)-> default('00:00:00');
            $table-> string('view_count')-> default(0);
            $table-> string('comment_count')-> default(0);

            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
