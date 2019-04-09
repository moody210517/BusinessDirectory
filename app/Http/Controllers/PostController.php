<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Post;


class PostController extends BaseController
{
    //
    public function index()
    {
        $posts = Post::latest()->get();
        return view('post.index', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('post.index', compact('posts'));
        //return view('post.show', compact('post'));
    }
    
}
