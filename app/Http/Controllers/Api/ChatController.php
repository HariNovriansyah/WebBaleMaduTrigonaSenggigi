<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $userId = $request->get('user_id');

        if ($user->role == 'admin' && $userId) {
            // Admin sees messages from a specific user
            $chats = Chat::with('sender')
                ->where(function($query) use ($userId) {
                    $query->where('sender_id', $userId)
                          ->orWhere('receiver_id', $userId);
                })
                ->orderBy('created_at', 'asc')
                ->get();
        } elseif ($user->role == 'user') {
            // User sees their messages with admins
            $chats = Chat::with('sender')
                ->where(function($query) use ($user) {
                    $query->where('sender_id', $user->id)
                          ->orWhere('receiver_id', $user->id)
                          ->orWhere('sender_id', User::where('role', 'admin')->pluck('id'))
                          ->orWhere('receiver_id', User::where('role', 'admin')->pluck('id'));
                })
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $chats = [];
        }

        return response()->json($chats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required_if:role,admin'
        ]);

        // Save the message to all admins if user
        if (Auth::user()->role == 'user') {
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                $chat = new Chat();
                $chat->sender_id = Auth::id();
                $chat->receiver_id = $admin->id;
                $chat->message = $request->message;
                $chat->save();
            }

        } elseif (Auth::user()->role == 'admin') {
            $chat = new Chat();
            $chat->sender_id = Auth::id();
            $chat->receiver_id = $request->receiver_id;
            $chat->message = $request->message;
            $chat->save();
        }

        return response()->json(['status' => 'success']);
    }

    public function markAsRead($id)
    {
        $chat = Chat::find($id);
        $chat->read_at = now();
        $chat->save();

        return response()->json(['status' => 'success']);
    }
}
