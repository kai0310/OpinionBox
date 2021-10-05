<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Class Post
 * @package App\Models
 *
 * @property int $id ID
 * @property int $user_id User ID
 * @property string $title Post Title
 * @property string $content Post Body
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

    protected $casts = [
        'user_id' => 'integer',
        'is_checked' => 'boolean',
    ];

    // Maximum number of acquisitions.
    public const TAKE_MAX_COUNT  = 10;
    public const TAKE_RAND_COUNT = 5;

    /**
     * @param $query
     */
    public function scopeApproved($query): void
    {
        $query->where('is_checked', true);
    }

    /**
     * @param $query
     */
    public function scopeNotApproved($query): void
    {
        $query->where('is_checked', false);
    }

    /**
     * Date posted
     *
     * @return string
     */
    public function getCreatedAttribute(): string
    {
        $diff = $this->created_at->diff(now());

        if ($diff->m > 0) {
            return date('Y年m月d日', strtotime($this->created_at));
        }

        if ($diff->d > 0) {
            return sprintf('%d 日前', $diff->d);
        }

        if ($diff->h > 0) {
            return sprintf('%d 時間前', $diff->h);
        }

        if ($diff->i > 0) {
            return sprintf('%d 分前', $diff->i);
        }

        if ($diff->s > 0) {
            return sprintf('%d 秒前', $diff->s);
        }

        return __('Just now');
    }

    /**
     * Posted user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Comments
     *
     * @return hasMany
     */
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Likes
     *
     * @return HasMany
     */
    public function likes(): hasMany
    {
        return $this->hasMany(Like::class);
    }
}
