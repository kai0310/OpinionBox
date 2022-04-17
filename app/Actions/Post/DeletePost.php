<?php

namespace App\Actions\Post;

use App\Exceptions\CannotDeletePostException;
use App\Models\Post;
use App\Models\User;

class DeletePost
{
    /**
     * @param Post $post
     * @param User $user
     * @return bool|null
     * @throws CannotDeletePostException
     */
    public function handle(Post $post, User $user): ?bool
    {
        if ($post->authorIs($user)) {
            return $post->delete();
        }

        throw CannotDeletePostException::notYourPost();
    }
}
