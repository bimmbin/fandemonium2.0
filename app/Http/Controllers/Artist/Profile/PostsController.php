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

        $is_owner = auth()->user()->username === $username;

        return Inertia::render('Artist/Profile/Posts', [
            'user' => $user,
            'is_owner' => $is_owner,
        ]);
    }
}
