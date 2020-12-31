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
            'posts', Post::where('is_checked', true)->inRandomOrder(self::TAKE_RAND_COUNT)->get(),
        );
    }

    public function create()
    {
        return view('post.create');
    }

    public function show($id)
    {

        $post = Post::findOrFail($id);

        if (!$post->is_checked ) {
            if ( $post->user_id != Auth::id() and !Auth::user()->is_admin ) {
                return abort(403);
            }
        }

        return view('post.show')->with(
            'post', Post::findOrFail($id),
        );
    }

    public function all()
    {
        return view('post.all')->with(
            'posts', Post::where('is_checked', true)->paginate(self::TAKE_MAX_COUNT)
        );
    }

    public function me()
    {
        return view('post.me')->with(
            'posts', Auth::user()->posts()->paginate(self::TAKE_MAX_COUNT)
        );
    }
}
