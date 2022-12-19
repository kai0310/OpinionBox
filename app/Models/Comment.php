<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Comment
 *
 * @property int $id ID
 * @property int $user_id User ID
 * @property string $body Comment Body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static find(int|null $deleteTargetCommentId)
 */
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];

    /**
     * Commented user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Commented post
     *
     * @return BelongsTo
     */
    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
