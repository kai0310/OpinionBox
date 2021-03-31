<?php

namespace App\Contracts\Actions\Post;

interface DeleteLikePosts
{
    public function delete(int $id);
}
