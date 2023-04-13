<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatsController extends Controller
{
    public function index()
    {
        foreach (Notification::where('receiver_id', '=', auth()->id())->get() as $n) {
            $n->destroy($n->id);
        };
        return Inertia::render('Chat/Index', ['chats' => Chat::query()->
        where('customer_id', '=', auth()->user()->id)->
        orWhere('specialist_id', '=', auth()->user()->id)->
        paginate(50)->
        through(fn($chat) => [
            'person' => User::findOrFail(auth()->user()->type == 'customer' ? $chat->customer_id : $chat->specialist_id),
        ]),
            'chat' => Chat::query()->
            where('customer_id', '=', auth()->user()->id)->
            orWhere('specialist_id', '=', auth()->user()->id)->
            paginate(1)->
            through(fn($chat) => [
                'id' => $chat->id,
                'person' => User::findOrFail(auth()->user()->type == 'customer' ? $chat->customer_id : $chat->specialist_id),
                'messages' => Message::where('chat_id', '=', $chat->id)->get(),
            ]),
        ]);
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request, $id)
    {
        $chat = Chat::findOrFail($id);
        $message = $chat->messages()->create([
            'message' => $request->message['_value'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/chats');
    }
}

