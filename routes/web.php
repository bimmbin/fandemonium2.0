<?php

use App\Http\Controllers\Artist\ArtistProfileAboutController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Artist\ArtistProfileController;
use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage.index');

Route::get('/artist/{username}/about', [ArtistProfileAboutController::class, 'index'])->name('artist.profile.about.index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/create-profile/artist', [ArtistProfileController::class, 'create'])->name('profile.create');
Route::resource('artist', ArtistProfileController::class);

Route::group(['middleware' => ['auth', 'role:artist']], function () {
    // Artist routes
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// spatie permissions guide
// Route::group(['middleware' => ['role:manager']], function () { ... });
// Route::group(['middleware' => ['permission:publish articles']], function () { ... });
// Route::group(['middleware' => ['role_or_permission:publish articles']], function () { ... });

// // for a specific guard:
// Route::group(['middleware' => ['role:manager,api']], function () { ... });

// // multiple middleware
// Route::group(['middleware' => ['role:manager','permission:publish articles']], function () { ... });