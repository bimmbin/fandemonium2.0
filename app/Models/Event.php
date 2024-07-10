<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_profile_id',
        'event_name',
        'description',
        'coords',
        'venue',
        'event_date',
        'start_time',
        'end_time',
        'ticket_link',
    ];
}
