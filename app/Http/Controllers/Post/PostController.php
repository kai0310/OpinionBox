<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        return view('post.index')->with(
            'posts', Post::inRandomOrder(Post::TAKE_RAND_COUNT)
            ->latest()
            ->get(),
        );
    }

    public function create()
    {
        return view('post.create');
    }

    public function show(int $id)
    {

        $post = Post::withoutGlobalScope('is_checked')
            ->findOrFail($id);

        // TODO: Policy を使う
        if ( !$post->is_checked ) {
            if ( $post->user_id != Auth::id() and !Auth::user()->is_admin ) {
                return abort(403);
            }
        }

        return view('post.show')->with(
            compact("post")
        );
    }
}
