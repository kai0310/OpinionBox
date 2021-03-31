<?php

namespace App\Actions\Post;

use Illuminate\Support\Facades\Auth;
use App\Contracts\Actions\Post\CreateLikePosts;
use App\Models\Like;


class CreateLikePost implements CreateLikePosts
{
    public function create(int $id)
    {
        Like::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);
    }

}
