<?php

namespace App\Http\Controllers\Artist;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Genre;
use App\Models\Profile;
use App\Models\ArtistMember;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ArtistProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Artist/Profile/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'artist_name' => 'required|string|max:255',
            'genres' => 'required',
            'members' => 'required',
            'username' => 'required|string|lowercase|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);


        //Storing profile image
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');

            $profile = Profile::create([
                'user_id' => $user->id,
                'profile_img_path' => '/storage/' . $image_path,
                'name' => $request->artist_name,
                'type' => 'artist',
            ]);
        } else {
            $profile = Profile::create([
                'user_id' => $user->id,
                'name' => $request->artist_name,
                'type' => 'artist',
            ]);
        }

        foreach ($request->genres as $genre) {
            Genre::create([
                'profile_id' => $profile->id,
                'name' => $genre,
            ]);
        }

        foreach ($request->members as $member) {
            ArtistMember::create([
                'artist_profile_id' => $profile->id,
                'name' => $member,
            ]);
        }

        $user->assignRole('artist');

        Auth::login($user);

        return redirect()->route('landingpage.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
