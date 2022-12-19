<?php

namespace App\Actions\Post;

use App\Contracts\Actions\Post\CreateLikePosts;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateLikePost implements CreateLikePosts
{
    public function create(Post $post): Model
    {
        return $post->likes()->create(['user_id' => Auth::id()]);
    }
}
