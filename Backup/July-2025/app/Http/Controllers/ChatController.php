<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\tbl_user;
use Auth;

class ChatController extends Controller
{
    public function index($userId)
    {
        $messages = Message::where(function ($q) use ($userId) {
            $q->where('sender_id', Auth::id())
                ->where('receiver_id', $userId);
        })
            ->orWhere(function ($q) use ($userId) {
                $q->where('sender_id', $userId)
                    ->where('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat.index', compact('messages', 'userId'));
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json(['success' => true, 'message' => $message]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:tbl_users,id',
            'message' => 'required|string|max:1000',
        ]);

        $chat = new Message();
        $chat->sender_id = auth()->id();
        $chat->receiver_id = $request->receiver_id;
        $chat->message = $request->message;
        $chat->mark_as_read = false;
        $chat->save();

        return response()->json(['status' => 'success', 'chat_id' => $chat->id]);
    }
    public function getMessages($userId)
    {
        $authId = Auth::id();

        $messages = Message::where(function ($q) use ($authId, $userId) {
            $q->where('sender_id', $authId)->where('receiver_id', $userId);
        })->orWhere(function ($q) use ($authId, $userId) {
            $q->where('sender_id', $userId)->where('receiver_id', $authId);
        })
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'messages' => $messages,
            'auth_id' => $authId
        ]);
    }
}
