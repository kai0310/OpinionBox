<?php

namespace App\Contracts\Actions\Post;

interface CreatePosts
{
    public function create(array $request): int;
}
