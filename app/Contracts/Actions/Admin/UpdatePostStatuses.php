<?php

namespace App\Contracts\Actions\Admin;

use App\Models\Post;

interface UpdatePostStatuses
{
    public function approve(Post $post);

    public function undoApprove(Post $post);
}
