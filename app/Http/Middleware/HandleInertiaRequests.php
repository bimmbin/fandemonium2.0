<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        if ($request->user()) {
            if ($request->user()->profile->profile_img_path !== null) {
                $profile_img_path = $request->user()->profile->profile_img_path;
            } else {
                $profile_img_path = null;
            }
        } else {
            $profile_img_path = null;
        }
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
                'profile_img_path' => $profile_img_path,
            ],
        ];
    }
}
