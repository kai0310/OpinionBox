<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private const TAKE_RAND_COUNT   = 5;
    private const TAKE_MAX_COUNT    = 10;

    public function index()
    {
        return view('post.index')->with(
            'posts', Post::inRandomOrder(self::TAKE_RAND_COUNT)->get(),
        );
    }

    public function store()
    {
        return;
    }

    public function create()
    {
        return view('post.create');
    }

    public function show($id)
    {
        return view('post.show')->with(
            'post', Post::findOrFail($id),
        );
    }

    public function all()
    {
        return view('post.all')->with(
            'posts', Post::paginate(self::TAKE_MAX_COUNT)
        );
    }

    public function me()
    {
        return view('post.me')->with(
            'posts', Auth::user()->posts()->paginate(self::TAKE_MAX_COUNT)
        );
    }
}
