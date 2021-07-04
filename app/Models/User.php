<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JoelButcher\Socialstream\HasConnectedAccounts;
use JoelButcher\Socialstream\SetsProfilePhotoFromUrl;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto {
        getProfilePhotoUrlAttribute as getPhotoUrl;
    }
    use HasConnectedAccounts;
    use Notifiable;
    use SetsProfilePhotoFromUrl;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
     * Get the URL to the user's profile photo.
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        if (filter_var($this->profile_photo_path, FILTER_VALIDATE_URL)) {
            return $this->profile_photo_path;
        }

        return $this->getPhotoUrl();
    }

    /**
     * Return the format user name.
     *
     * @param $name
     * @return array|string|string[]|null
     */
    public function getNameAttribute($name)
    {
        return  preg_replace('/[0-9]/', '', $name);
    }

    /**
     * Return the number of the comments and posts.
     *
     * @return int
     */
    public function getContributions(): int
    {
        return count($this->posts) + count($this->comments);
    }

    /**
     * Return the number of comments and posts as the number of opinions contributed.
     *
     * @return int
     */
    public function getContributionsAttribute(): int
    {
        return $this->getContributions();
    }

    /**
     * User posts.
     *
     * @return HasMany
     */
    public function posts(): hasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * User comments.
     *
     * @return hasMany
     */
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * User likes.
     *
     * @return HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
