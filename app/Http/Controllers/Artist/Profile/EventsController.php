<?php

namespace App\Http\Controllers\Artist\Profile;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Helpers\ArtistHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index($username)
    {
        ArtistHelpers::redirectIfUserNotArtist($username);

        $user = User::with('profile')->where('username', $username)->first();

        $is_owner = auth()->user()->username === $username;

        $events = Event::whereHas('profile', function ($query) use ($username) {
            $query->whereHas('user', function ($query) use ($username) {
                $query->where('username', $username);
            });
        })->get();

        return Inertia::render('Artist/Profile/Events', [
            'user' => $user,
            'is_owner' => $is_owner,
            'events' => $events,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_description' => 'required|string',
            'location' => 'required|string',
            'venue' => 'required|string',
            'event_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'ticket_link' => 'nullable|string',
        ]);

        Event::create([
            'artist_profile_id' => Auth::user()->profile->id,
            'event_name' => $request->event_name,
            'description' => $request->event_description,
            'coords' => $request->location,
            'venue' => $request->venue,
            'event_date' => $request->event_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'ticket_link' => $request->ticket_link,
        ]);

        return redirect()->back();
    }
}
