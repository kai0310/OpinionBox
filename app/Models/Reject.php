<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reject extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'history_posts_id',
    ];

    /**
     * ユーザ
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    /**
     * 投稿
     * @return BelongsTo
     */
    public function history_posts(): BelongsTo
    {
        return $this->belongsTo(HistoryPost::class);
    }
}
