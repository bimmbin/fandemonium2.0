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
        Schema::create('fandemonia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fan_profile_id')
                ->constrained('profiles')
                ->onDelete('cascade');
            $table->foreignId('artist_profile_id')
                ->constrained('profiles')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fandemonia');
    }
};
