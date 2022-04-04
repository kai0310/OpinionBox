<?php

namespace App\Actions\Post;

use App\Exceptions\CannotDeletePostException;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DeletePost
{
    /**
     * @param Post $post
     * @return bool|null
     * @throws CannotDeletePostException
     */
    public function handle(Post $post): ?bool
    {
        if ($post->user()->is(Auth::user())) {
            return $post->delete();
        }

        throw CannotDeletePostException::notYourPost();
    }
}
