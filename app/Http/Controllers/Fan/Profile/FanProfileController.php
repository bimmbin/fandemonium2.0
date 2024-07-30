<?php

namespace App\Http\Controllers\Fan\Profile;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FanProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('Fan/FanProfile');
    }
}
