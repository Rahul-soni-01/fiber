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
        $authId = Auth::user()->id;

        $messages = Message::where(function ($q) use ($authId, $userId) {
            $q->where('sender_id', $authId)->where('receiver_id', $userId);
        })->orWhere(function ($q) use ($authId, $userId) {
            $q->where('sender_id', $userId)->where('receiver_id', $authId);
        })
            ->orderBy('created_at', 'asc')
            ->get();
             
             // ✅ Auto-mark messages from the other user as read
            Message::where('sender_id', $userId)
            ->where('receiver_id', auth()->user()->id)
            ->where('mark_as_read', 0)
            ->update(['mark_as_read' => 1]);

        return response()->json([
            'messages' => $messages,
            'auth_id' => $authId
        ]);
    }
    public function fetch( $id, Request $request)
    {
        dd($request->all(),$id);
        $id = $request->user_id;
        $messages = Message::where(function ($query) use ($id) {
            $query->where('sender_id', auth()->user()->id)
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', auth()->user()->id);
        })->orderBy('created_at')->get();

        // ✅ Auto-mark messages from the other user as read
        Message::where('sender_id', $id)
            ->where('receiver_id', auth()->user()->id)
            ->where('mark_as_read', 0)
            ->update(['mark_as_read' => 1]);

        return response()->json([
            'messages' => $messages,
        ]);
    }
}
