<?php

namespace App\Http\Controllers;

use App\Events\ServiceAcceptNotification;
use App\Http\Requests\CreateService;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function create()
    {
        if (auth()->user()->type == 'customer') {
            return Inertia::render('Customer/Create', ['specializations' => Specialization::all()]);
        } else {
            abort(403);
        }
    }

    public function store(CreateService $request)
    {
        $request['user_id'] = Auth::id();
        $request['deadline'] = $request['deadline'] ? Carbon::createFromTimestamp(strtotime($request->deadline))->format('m/d/Y') : null;
        Service::create(request()->all());

        return redirect('/profile');
    }

    public function updateIndex($id)
    {
        $service = Service::findOrFail($id);
        if ($service->user->id == auth()->user()->id) {
            return Inertia::render('Customer/Update', ['service' => $service, 'specializations' => Specialization::all()]);
        } else {
            abort(403);
        }
    }

    public function update(CreateService $request, $id)
    {
        $request['deadline'] = $request['deadline'] ? Carbon::createFromTimestamp(strtotime($request->deadline))->format('m/d/Y') : null;
        Service::findOrFail($id)->update(request()->all());

        return redirect('/profile');
    }

    public function accept($id)
    {
        $service = Service::findOrFail($id);
        Notification::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $service->user->id,
            'service_id' => $service->id,
            'type' => 'accept',
        ]);
    }
}
