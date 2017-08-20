<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;


class PostsController extends Controller
{
    public function index ()
    {

        $posts = Post::latest()
            ->filter(request(['month','year']))
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function create ()
    {
        return view('posts.create');
    }

    public function store ()
    {
        $this->validate(request(), [
            'title' => 'required|min:5',
            'body' => 'required|min:10'
        ]);

        auth()->user()->publish(
            new Post(request(['title','body']))
        );
        session()->flash('message','Your post have been published');

        return redirect()->home();

    }

    public function show (Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function __construct ()
    {
        $this->middleware('auth')->except('index','show');
    }
}
