<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class MyPostAction extends Controller
{
    /**
     * 自分の投稿を表示
     */
    public function __invoke()
    {
        return view('post.me')->with(
            'posts', Auth::user()->posts()
            ->withoutGlobalScope('is_checked')
            ->latest()
            ->paginate(Post::TAKE_MAX_COUNT)
        );
    }
}
