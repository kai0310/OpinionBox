<?php

namespace App\Actions\Post;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Actions\Post\CreateComments;
use App\Models\Comment;


class CreateComment implements CreateComments
{
    public function create(array $request)
    {
        Validator::make($request, [
            'body' => ['required', 'string', 'max:30'],
        ])->validate();

        Comment::create([
            'body' => $request['body'],
            'user_id' => Auth::id(),
            'post_id' => $request['postId'],
        ]);
    }
}
