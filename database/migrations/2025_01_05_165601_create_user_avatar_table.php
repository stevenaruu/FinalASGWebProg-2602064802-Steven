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
        Schema::create('user_avatar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('avatar_id')->constrained('avatar')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('isActive')->default(false);
            $table->enum('status', ['Saved', 'Pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_avatar');
    }
};
