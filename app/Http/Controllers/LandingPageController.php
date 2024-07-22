<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        $no_profile = false;

        if (Auth::check()) {
            $no_profile = Auth::user()->profile->name === 'fandemonium user' ? true : false;
        }

        return Inertia::render('LandingPage', [
            'no_profile' => $no_profile,
        ]);
    }
}
