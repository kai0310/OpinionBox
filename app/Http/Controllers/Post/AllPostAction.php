<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class AllPostAction extends Controller
{
    /**
     * 承認済みの全投稿を表示
     */
    public function __invoke()
    {
        return view('post.all')->with(
            'posts', Post::orderByCreated('desc')
            ->paginate(Post::TAKE_MAX_COUNT)
        );
    }
}
