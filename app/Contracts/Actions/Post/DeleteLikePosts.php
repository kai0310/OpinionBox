<?php

namespace App\Contracts\Actions\Post;

use App\Models\Post;

interface DeleteLikePosts
{
    public function delete(Post $post);
}
