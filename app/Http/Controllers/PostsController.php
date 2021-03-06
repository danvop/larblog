<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;
use App\Task;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show', 'index']);
    }
    public function index()
    {
        if(request(['month', 'year'])){
            $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();    
        } else {
          $posts = Post::latest()->get(); 
        }
        
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

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        session()->flash('message', 'Your post has been published');
        return redirect('/blog');
    }
}


