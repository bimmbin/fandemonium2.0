<?php

namespace App\Http\Controllers\Settings;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SavedLocationsController extends Controller
{
    public function index()
    {
        return Inertia::render('Settings/SavedLocations');
    }
}
