<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin'          => 'boolean',
        'is_developer'      => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $dates = ['deleted_at'];

    /**
     * 退会済みのユーザの名前を指定
     *
     * @param $name
     * @return string
     */
    public function getNameAttribute($name): string
    {
        if ( isset($this->deleted_at) ){
            return '退会済みユーザ';
        } else {
            return $name;
        }
    }

    /**
     * コメント数と投稿数を返却
     *
     * @return int
     */
    public function getContributions(): int
    {
        return count($this->posts) + count($this->comments);
    }

    /**
     * 意見の貢献数として, コメント数と投稿数を返却
     *
     * @return int
     */
    public function getContributionsAttribute(): int
    {
        return $this->getContributions();
    }

    /**
     * 投稿
     *
     * @return HasMany
     */
    public function posts(): hasMany
    {
        return $this->hasMany(Post::class);
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
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
