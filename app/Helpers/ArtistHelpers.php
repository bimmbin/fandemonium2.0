<?php

namespace App\Helpers;

use App\Models\User;

class ArtistHelpers
{
    public static function redirectIfUserNotArtist($username)
    {
        $user = User::where('username', $username)->first();
        if ($user && !$user->hasRole('artist')) {
            abort(404);
        }
    }
}
