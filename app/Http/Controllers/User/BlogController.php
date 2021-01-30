<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(4);
        return view('user.blogs', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('user.view_blog', compact('blog'));
    }
}
