<?php

namespace App\Actions\Post;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Actions\Post\CreateComments;


class CreateComment implements CreateComments
{
    public function create(array $request)
    {
        Validator::make($request, [
            'body' => ['required', 'string', 'max:200'],
        ])->validate();

        return Auth::user()?->comments()->create([
            'body'      => $request['body'],
            'post_id'   => $request['postId'],
        ]);
    }
}
