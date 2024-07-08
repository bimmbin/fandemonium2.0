<?php

namespace App\Http\Controllers\Artist\Profile;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FansController extends Controller
{
    public function index($username)
    {
        $user = User::with('profile')->where('username', $username)->first();

        return Inertia::render('Artist/Profile/Fans', [
            'user' => $user,
        ]);
    }
}
