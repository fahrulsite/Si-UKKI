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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('body');
            $table->dateTime('date');
            $table->foreignId('organized_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->json('volunteer_category_id')->constrained('volunteer_categories')->onDelete('cascade')->nullable(); 
            $table->string('url');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
