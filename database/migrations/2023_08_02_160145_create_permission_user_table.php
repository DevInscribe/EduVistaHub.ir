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
        Schema::create('permission_user', function (Blueprint $table) {

            $table->bigInteger('permission_id')->unsigned()->index()->nullable();

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('user_id')->unsigned()->index()->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        
            $table->primary(['permission_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_user');
    }
};
