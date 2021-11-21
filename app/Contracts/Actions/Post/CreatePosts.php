<?php

namespace App\Contracts\Actions\Post;

use App\Models\Post;

interface CreatePosts
{
    public function create(array $request): Post;
}
