<?php

namespace App\Actions\Admin;

use App\Contracts\Actions\Admin\UpdatePostStatuses;
use App\Models\Post;

class UpdatePostStatus implements UpdatePostStatuses
{
    public function update(int $id)
    {
        return Post::withoutGlobalScope('is_checked')->whereId($id)
            ->update([
                'is_checked' => true,
            ]);
    }
}
