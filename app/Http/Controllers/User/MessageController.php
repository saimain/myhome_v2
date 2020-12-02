<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
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
        $messages = Message::where('to_id', $user_id)->orWhere('from_id', $user_id)->get();
        return view('user.dashboard.view_message', compact('messages'));
    }
}
