<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(3);
        return view('dashboard.view_blog', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->body = $request->body;

        if ($request->has('image')) {
            $img = $request->file('image');
            $path = public_path('/storage/blog/');

            $img_name = time() . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move($path, $img_name);
        }

        $blog->image = $img_name;
        $blog->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('dashboard.edit_blog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $blog->title = $request->title;
        $blog->body = $request->body;

        if ($request->has('image')) {
            $img = $request->file('image');
            $path = public_path('/storage/blog/');
            unlink($path . $blog->image);
            $img_name = time() . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move($path, $img_name);
            $blog->image = $img_name;
        }

        $blog->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
