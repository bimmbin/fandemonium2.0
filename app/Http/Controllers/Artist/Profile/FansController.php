<?php

namespace App\Http\Controllers\Artist\Profile;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Helpers\ArtistHelpers;
use App\Http\Controllers\Controller;

class FansController extends Controller
{
    public function index($username)
    {
        ArtistHelpers::redirectIfUserNotArtist($username);

        $user = User::with('profile')->where('username', $username)->first();

        $is_owner = auth()->user()->username === $username;

        return Inertia::render('Artist/Profile/Fans', [
            'user' => $user,
            'is_owner' => $is_owner,
        ]);
    }
}
