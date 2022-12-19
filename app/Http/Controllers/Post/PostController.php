<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Show approved random posts.
     *
     * @return View
     */
    public function index(): View
    {
        return view('post.index')->with(
            'posts', Post::approved()->inRandomOrder(Post::TAKE_RAND_COUNT)->latest()->get(),
        );
    }

    /**
     * Show post create form.
     *
     * @return View
     */
    public function create(): View
    {
        return view('post.create');
    }

    /**
     * Show select a post.
     *
     * @param  Post  $post
     * @return View
     */
    public function show(Post $post): View
    {
        Gate::authorize('view', $post);

        return view('post.show', compact('post'));
    }
}
