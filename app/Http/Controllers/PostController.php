<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        return Inertia::render('Post/Index', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $posts = Post::find($id)->with('comments.user')->first();
        return Inertia::render('Post/Show', compact('posts'));
    }

    public function create()
    {
        return Inertia::render('Post/Create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'title' => ['required'],
            'body' => ['required'],
        ])->validateWithBag('postCreate');

        $post = new Post;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return Redirect::route('post.index');
    }
}
