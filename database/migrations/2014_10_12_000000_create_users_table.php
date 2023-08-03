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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_superuser')->default(0);
            $table->boolean('is_staff')->default(0);
            $table->boolean('is_member')->default(1);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->string('username')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('birth_month')->nullable();
            $table->string('title_job')->nullable();
            $table->string('about_us')->nullable();
            $table->string('website')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('facebook_link')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
