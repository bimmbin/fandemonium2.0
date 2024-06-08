<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Schema::create('profiles', function (Blueprint $table) {
    //     $table->id();
    //     $table->foreignId('user_id')
    //         ->constrained('users')
    //         ->onDelete('cascade');
    //     $table->string('profile_img_path')->default('default.jpg');
    //     $table->string('first_name')->nullable();
    //     $table->string('last_name')->nullable();
    //     $table->string('middle_name')->nullable();
    //     $table->string('genre')->nullable();
    //     $table->text('background')->nullable();
    //     $table->enum('type', ['fan', 'artist'])->default('fan');
    //     $table->timestamps();
    // });
    protected $fillable = [
        'user_id',
        'profile_img_path',
        'first_name',
        'last_name',
        'middle_name',
        'genre',
        'background',
        'type',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the artist members for the profile.
     */
    public function artistMembers()
    {
        return $this->hasMany(ArtistMember::class, 'artist_profile_id');
    }
}
