<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\View\View;

class MyPostAction extends Controller
{
    /**
     * Show own post.
     * @return View
     */
    public function __invoke(): View
    {
        return view('post.me')->with(
            'posts', Auth::user()?->posts()->latest()->paginate(Post::TAKE_MAX_COUNT)
        );
    }
}
