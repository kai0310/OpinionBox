<?php

namespace App\Actions\Post;

use App\Contracts\Actions\Post\DeleteLikePosts;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DeleteLikePost implements DeleteLikePosts
{
    public function delete(Post $post)
    {
        return $post->likes()->whereBelongsTo(Auth::user())->delete();
    }
}
