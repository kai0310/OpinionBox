<?php

namespace App\Actions\Admin;

use App\Contracts\Actions\Admin\UpdatePostStatuses;
use App\Models\Post;

class UpdatePostStatus implements UpdatePostStatuses
{
    public function approve(Post $post): bool
    {
        return $post->update(['approved_at' => now()]);
    }

    public function undoApprove(Post $post): bool
    {
        return $post->update(['approved_at' => null]);
    }

}
