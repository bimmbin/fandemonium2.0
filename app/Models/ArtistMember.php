<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistMember extends Model
{
    use HasFactory;

    // Schema::create('artist_members', function (Blueprint $table) {
    //     $table->id();
    //     $table->foreignId('artist_profile_id')
    //         ->constrained('profiles')
    //         ->onDelete('cascade');
    //     $table->string('name');
    //     $table->timestamps();
    // });

    protected $fillable =   [
        'artist_profile_id',
        'name'
    ];
}
