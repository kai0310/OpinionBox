<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class AllPostAction extends Controller
{
    /**
     * Show all approved posts.
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('post.all')->with(
            'posts', Post::approved()->latest()->paginate(Post::TAKE_MAX_COUNT)
        );
    }
}
