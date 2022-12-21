<?php

namespace App\Actions\Post;

use App\Contracts\Actions\Post\CreateComments;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateComment implements CreateComments
{
    /**
     * @throws ValidationException
     */
    public function create(Post $post, array $request)
    {
        Validator::make($request, [
            'body' => ['required', 'string', 'max:200'],
        ])->validate();

        return $post->comments()->create([
            'body' => $request['body'],
            'user_id' => Auth::id(),
        ]);
    }
}
