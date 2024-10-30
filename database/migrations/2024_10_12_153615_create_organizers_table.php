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
        Schema::create('organizers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('address');
            $table->string('fakulty');
            $table->string('class');
            $table->string('generation');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->date('year_of_birth');
            $table->string('phone_number');
            $table->string('instagram');
            $table->json('management')->nullable();
            $table->boolean('graduated')->default(false);
            $table->string('job')->nullable();
            $table->string('place_of_job')->nullable();
            $table->boolean('DD1')->default(false);
            $table->boolean('DD2')->default(false);
            $table->boolean('DD3')->default(false);
            $table->json('achievement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};
