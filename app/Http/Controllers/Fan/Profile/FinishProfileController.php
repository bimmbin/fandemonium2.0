<?php

namespace App\Http\Controllers\Fan\Profile;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FinishProfileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $profile = Profile::findOrFail($user->profile->id);

        //Storing profile name
        $profile->name = $request->name;

        //Storing profile image
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
            $profile->profile_img_path = '/storage/' . $image_path;
        }

        $profile->save();
    }
}
