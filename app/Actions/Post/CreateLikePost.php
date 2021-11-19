<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Actions\Post\CreateLikePosts;

class CreateLikePost implements CreateLikePosts
{
    public function create(Post $post): Model
    {
        return $post->likes()->create(['user_id' => Auth::id()]);
    }

}
