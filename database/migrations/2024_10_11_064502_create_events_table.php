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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('body');
            $table->dateTime('dateTime');
            $table->foreignId('organized_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('event_category_id')->constrained('event_categories')->onDelete('cascade'); // Relasi ke tabel event categories
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};