<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\Pure;
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
        'name', 'email', 'password', 'bio',
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
        'is_admin' => 'boolean',
        'is_developer' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $with = [
        'roles',
    ];

    public const STUFF = 'stuff';
    public const DEVELOPER = 'developer';

    /**
     * Return the user is stuff.
     * @return bool
     */
    public function isStuff(): bool
    {
        if (config('opinion-box.settings.admin_is_stuff') && $this->is_admin) {
            return true;
        }

        return $this->hasRole(self::STUFF);
    }

    /**
     * Return the user is ban.
     * @return bool
     */
    public function isBanned(): bool
    {
        return ! is_null($this->banned_at);
    }

    /**
     * Get the URL to the user's profile photo.
     * @return string
     */
    public function getProfilePhotoUrlAttribute(): string
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
     * @return array|string|null
     */
    public function getNameAttribute($name): array|string|null
    {
        return preg_replace('/[0-9]/', '', $name);
    }

    /**
     * Return student number.
     * @return false|string|null
     */
    public function getStudentNumberAttribute(): false|string|null
    {
        if (config('services.google.custom_domain')) {
            return mb_strstr($this->email, '@' . config('services.google.custom_domain'), true);
        }
        return Null;
    }

    public function getLastAccessed(): Carbon|string
    {
        if (config('session.driver') !== 'database') {
            return 'NaN';
        }

        $sessions = DB::connection(config('session.connection'))
            ->table(config('session.table', 'sessions'))
            ->where('user_id', $this->id)
            ->orderBy('last_activity', 'desc')
            ->get('last_activity');

        if ($sessions->first() === null) {
            return 'NaN';
        }

        return Carbon::createFromTimestamp($this->getLastAccessed()->first()->last_activity);
    }

    public function getLastAccessedAttribute()
    {
        if ($this->getLastAccessed() !== 'NaN') {
            return $this->getLastAccessed()->first()->diffForHumans();
        }
    }

    public function getIsOnlineAttribute(): bool
    {
        return $this->getLastAccessed()->m > 5;
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
    #[Pure] public function getContributionsAttribute(): int
    {
        return $this->getContributions();
    }

    /**
     * Return ser role list.
     *
     * @return array
     */
    public function getRoleListAttribute(): array
    {
        return $this->roles()->pluck('name')->toArray();
    }

    /**
     * Check user has the role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return in_array($role, $this->role_list, true);
    }

    /**
     * User posts
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

    /**
     * The roles that belong to the user.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
