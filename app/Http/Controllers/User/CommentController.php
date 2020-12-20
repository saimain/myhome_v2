<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, $id)
    {
        $request->validate([
            'text' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->property_id = $id;
        $comment->text = $request->text;
        $comment->save();
        return back();
    }
}
