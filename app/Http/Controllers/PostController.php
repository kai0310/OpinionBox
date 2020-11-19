<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::with('comment')->where('user_id', Auth::id())->latest()->get();
        return Inertia::render('Post/Index', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = $post->comment;

        dump($comments->user->name);
        return Inertia::render('Post/Show', [
            'post' => $post,
            'comments' => $comments,
        ]);
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
