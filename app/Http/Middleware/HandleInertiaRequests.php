<?php

namespace App\Http\Middleware;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => auth()->user() ? [
                    'id' => auth()->user()->id,
                    'type' => auth()->user()->type,
                    'name' => auth()->user()->name,
                    'surname' => auth()->user()->surname,
                    'avatar' => auth()->user()->avatar,
                    'online' => Cache::has('user-is-online-' . auth()->user()->id),
                    'last_seen' => auth()->user()->last_seen,
                    'created_at' => auth()->user()->created_at,
                    'about' => auth()->user()->about,
                ] : null,
            ],
            'notifications' => auth()->user()? Notification::query()
                ->where('receiver_id', '=', auth()->user()->id)
                ->paginate(5)
                ->through(fn($item)=>[
                    'type'=>$item->type,
                    'sender_name'=>$item->sender->name,
                    'sender_surname'=>$item->sender->surname,
                ]) : null,
            'canCreate' => [
                'customer' => auth()->user() && auth()->user()->type == 'customer',
                'specialist' => auth()->user() && auth()->user()->type == 'specialist',
            ]
        ]);
    }
}