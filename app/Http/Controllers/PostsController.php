<?php

namespace App\Http\Controllers;

use App\Post;
use App\Task;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // request()->validate([
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);
        //dd($errors);
        Post::create(request(['title', 'body']));

        return redirect('/');
    }
}


