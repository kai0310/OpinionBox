<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexAction extends Controller
{
    /**
     * 未承認の投稿を表示
     */
    public function __invoke()
    {
        return view('stuff.index')->with(
            'posts', Post::notApproved()->latest()->paginate(Post::TAKE_MAX_COUNT)
        );
    }
}
