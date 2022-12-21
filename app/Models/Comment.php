<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use BelongsToUser, HasFactory, SoftDeletes;

    protected $fillable = [
        'body', 'user_id', 'commentable_id', 'commentable_type',
    ];

    protected $with = [
        'user',
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
