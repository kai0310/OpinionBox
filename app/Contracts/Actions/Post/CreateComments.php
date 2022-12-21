<?php

namespace App\Contracts\Actions\Post;

use App\Models\Post;

interface CreateComments
{
    public function create(Post $post, array $request);
}
