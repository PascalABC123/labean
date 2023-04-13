<?php

namespace App\Http\Controllers;

use App\Events\ServiceAcceptNotification;
use App\Http\Requests\CreateUser;
use App\Http\Requests\CreateUserSpec;
use App\Http\Requests\StoreUser;
use App\Models\Notification;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function profile()
    {
        if (auth()->user()) {
            return Inertia::render('Profile/Index', ['services' => Service::query()
                ->where('user_id', '=', auth()->user()->id)
                ->paginate(50)
                ->through(fn($service) => [
                    'id' => $service->id,
                    'header' => $service->header,
                    'min_price' => $service->min_price,
                    'max_price' => $service->max_price,
                    'deadline' => $service->deadline,
                    'specialization' => [
                        'name' => $service->specialization->name,
                        'picture' => $service->specialization->picture,
                    ],
                ])
            ]);
        } else {
            return Inertia::render('User/Profile');
        }
    }

    public function login()
    {
        return Inertia::render('User/Auth');
    }

    public function register()
    {
        return Inertia::render('User/Register');
    }

    public function registerSpecialist()
    {
        return Inertia::render('User/Specialist/Register');
    }

    public function store(StoreUser $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('profile');
    }

    public function create(CreateUser $request)
    {
        $user = User::create([
            'type' => 'customer',
            'name' => request()->name,
            'surname' => request()->surname,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'last_seen' => now(),
        ]);

        Auth::login($user);

        return redirect('profile');
    }

    public function createSpec(CreateUser $request)
    {
        $user = User::create([
            'type' => 'specialist',
            'name' => request()->name,
            'number' => request()->number,
            'surname' => request()->surname,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'last_seen' => now(),
        ]);

        Auth::login($user);

        return redirect('profile');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }

    public function aboutUpdate()
    {
        request()->validate([
            'about' => 'required|string|max:1000',
        ]);

        auth()->user()->about = request()->about;
        auth()->user()->update();

        return redirect('/profile');
    }
}
