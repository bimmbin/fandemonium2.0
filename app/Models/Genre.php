<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'name',
    ];

    /**
     * Get the profile that owns the genre.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
