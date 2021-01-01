<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class Post
 * @package App\Models
 *
 * @property int $id ID
 * @property int $user_id ユーザID
 * @property string $title タイトル
 * @property string $content 本文
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    protected $dateFormat = 'Y-m-d H:i';

    protected $casts = [
        'is_checked' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return hasMany
     */
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }
}
