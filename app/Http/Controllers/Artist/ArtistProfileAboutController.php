<?php

namespace App\Http\Controllers\Artist;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistProfileAboutController extends Controller
{
    public function index($username)
    {
        $user = User::with('profile')->where('username', $username)->first();

        return Inertia::render('Artist/Profile/About', [
            'user' => $user,
        ]);
    }
}
