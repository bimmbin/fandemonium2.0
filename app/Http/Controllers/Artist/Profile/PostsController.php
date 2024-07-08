<?php

namespace App\Http\Controllers\Artist\Profile;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index($username)
    {
        $user = User::with('profile')->where('username', $username)->first();

        return Inertia::render('Artist/Profile/Posts', [
            'user' => $user,
        ]);
    }
}
