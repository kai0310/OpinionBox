<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{

    /**
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Post/Index')->with(
            'posts', Auth::user()->posts()->get()
        );
    }

    /**
     * @param $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        return Inertia::render('Post/Show')->with(
            'posts',Post::find($id)->with('comments.user')->first()
        );
    }

    /**
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Post/Create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'title' => ['required'],
            'body' => ['required'],
        ])->validateWithBag('postCreate');

        Post::create([
            'user_id'   => Auth::id(),
            'title'     => $request->title,
            'body'      => $request->body,
        ]);
        return Redirect::route('post.index');
    }
}
