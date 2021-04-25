<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexAction extends Controller
{
    /**
     * 未承認の投稿を表示
     */
    public function __invoke()
    {
        return view('admin.index')->with(
            'posts', Post::withoutGlobalScope('is_checked')
            ->where('is_checked', false)->latest()->paginate(Post::TAKE_MAX_COUNT)
        );
    }
}
