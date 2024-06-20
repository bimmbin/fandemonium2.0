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
            $table->foreignId('artist_profile_id')
                ->constrained('profiles')
                ->onDelete('cascade');
            $table->string('event_name');
            $table->text('description');
            $table->string('coords');
            $table->string('venue');
            $table->dateTime('event_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('ticket_link')->nullable();
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
