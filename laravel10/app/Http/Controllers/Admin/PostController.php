<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.post.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->img = $request->img;
        // $post->img = '/' . $request->img;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->save();

        return redirect()->back()->withSuccess('Статья успешно Добавленна!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.post.edit', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->img = $request->img;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->save();

        return redirect()->back()->withSuccess('Статья была успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->withSuccess('Статья успешно удалена!');
    }
}
