<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $recent_messages = Message::where('from_id', Auth::id())->orWhere('to_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('user.dashboard.inbox_message', compact('recent_messages'));
    }

    public function viewMessge($user_id)
    {
        if ($user_id == Auth::id()) {
            return back();
        } else {
            $messages = Message::where('to_id', $user_id)->orWhere('from_id', $user_id)->get();
            $my_messages = Message::where('to_id', Auth::id())->get();
            foreach ($my_messages as $my_message) {
                $my_message->is_read = 1;
                $my_message->update();
            }
            return view('user.dashboard.view_message', compact('messages'));
        }
    }

    public function sendMessage($user_id, Request $request)
    {

        $request->validate([
            'message' => 'required'
        ]);

        $user = User::find($user_id);
        $message = new Message();
        $message->from_id = Auth::id();
        $message->to_id = $user_id;
        $message->message = $request->message;
        $message->is_read = 0;
        $message->save();
        return back();
    }
}
