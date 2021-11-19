<?php

namespace App\Contracts\Actions\Post;

use App\Models\Post;

interface CreateLikePosts
{
    public function create(Post $post);
}
