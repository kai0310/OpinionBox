<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

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

    protected $casts = [
        'is_checked' => 'boolean',
    ];

    // 最大取得数
    public const TAKE_MAX_COUNT  = 10;
    public const TAKE_RAND_COUNT = 5;

    /**
     * 投稿日時
     *
     * @return string
     */
    public function getCreatedAttribute()
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

        return 'たった今';
    }

    /**
     * 承認済みの投稿のみ
     */
    protected static function booted()
    {
        static::addGlobalScope('is_checked', function (Builder $builder) {
            $builder->where('is_checked', true);
        });
    }


    /**
     * 投稿順にソート
     *
     * @param $query
     * @param string $direction
     */
    public function scopeOrderByCreated($query, $direction = 'asc') {
        $query->orderBy('created_at', $direction);
    }

    /**
     * 投稿者
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    /**
     * コメント
     *
     * @return hasMany
     */
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * いいね
     *
     * @return HasMany
     */
    public function likes(): hasMany
    {
        return $this->hasMany(Like::class);
    }
}
