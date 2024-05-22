<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // $posts_count = Post::all()->count();
        $posts_count = Post::count();
        return view('admin.home.index', [
            'posts_count'=>$posts_count
        ]);
    }
}
