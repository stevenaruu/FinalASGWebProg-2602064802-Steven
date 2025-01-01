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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->foreignId('gender_id')->constrained('gender')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('hobby_id')->constrained('hobby')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('mobile_number');
            $table->integer('coin');
            $table->binary('image')->nullable();
            $table->boolean('isVisible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
