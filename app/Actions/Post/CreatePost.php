<?php

namespace App\Actions\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Actions\Post\CreatePosts;
use App\Models\Post;


class CreatePost implements CreatePosts
{
    public function create(array $request): Post
    {
        Validator::make($request, [
            'title'     => ['required', 'string', 'min:5', 'max:30'],
            'content'   => ['required', 'string', 'min:20', 'max:500'],
        ])->validate();

        return Auth::user()?->posts()->create([
            'title'         => $request['title'],
            'content'       => $request['content'],
            'published_at'  => now(),
        ]);
    }
}
