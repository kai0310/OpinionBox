<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment
 * @package App\Models
 *
 * @property int $id ID
 * @property int $user_id ユーザID
 * @property string $body 本文
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];

    protected $dateFormat = 'Y-m-d H:i';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
