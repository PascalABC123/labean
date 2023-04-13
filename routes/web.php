<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// NAVIGATION

Route::get('/', function () {
    return Inertia::render('Home', ['categories' => Specialization::all()]);
})->name('home');

Route::get('/customer', function () {
    return Inertia::render('Customer/Index');
})->name('customer');

Route::get('/specialist', function () {
    return Inertia::render('Specialist/Index', ['services' => Service::query()
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
            'user' => [
                'name' => $service->user->name,
                'surname' => $service->user->surname,
            ]
        ])
    ]);
})->name('specialist');

Route::get('/service/{id}', function ($id) {
    $service = Service::findOrFail($id);
    return Inertia::render('Service', ['data' => [
        'service'=>$service,
        'specialization'=>$service->specialization,
        'user'=>[
            'id' => $service->user->id,
            'name' => $service->user->name,
            'surname' => $service->user->surname,
            'avatar' => $service->user->avatar,
            'last_seen' => $service->user->last_seen,
            'online' => true,
        ],
    ]]);
})->name('service');

// EVENTS

Route::post('/service/{id}/accept', [ServiceController::class, 'accept'])->name('service.accept')->middleware('auth');

// USER

Route::get('/join', [UserController::class, 'profile'])->name('user.profile');

Route::get('/login', [UserController::class, 'login'])->name('user.login')->middleware('guest');
Route::post('/login', [UserController::class, 'store']);

Route::get('/register', [UserController::class, 'register'])->name('user.register.customer')->middleware('guest');
Route::post('/register', [UserController::class, 'create']);

Route::get('/register-specialist', [UserController::class, 'registerSpecialist'])->name('user.register.specialist')->middleware('guest');
Route::post('/register-specialist', [UserController::class, 'createSpec']);

Route::get('/password-request', [UserController::class, 'create'])->name('user.password.request');

// PROFILE

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::post('/profile/avatar-request', [UserController::class, 'avatar'])->name('profile.avatar.request');

    Route::post('/profile/about-request', [UserController::class, 'aboutUpdate'])->name('profile.about.request');

    Route::post('/profile/logout', [UserController::class, 'destroy'])->name('profile.logout');
});

// CUSTOMER

Route::middleware('auth')->group(function () {
    Route::get('/customer/create', [ServiceController::class, 'create'])->name('customer.create');
    Route::post('/customer/create', [ServiceController::class, 'store']);

    Route::get('/service/{id}/update', [ServiceController::class, 'updateIndex'])->name('service.update');
    Route::post('/service/{id}/update', [ServiceController::class, 'update']);
});

// CHATS

Route::middleware('auth')->group(function () {
   Route::get('chats', [ChatsController::class, 'index'])->name('chats');

    Route::post('chat/{id}', [ChatsController::class, 'sendMessage'])->name('chat.send.message');
});
