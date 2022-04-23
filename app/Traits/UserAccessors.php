<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\Pure;
use Laravel\Jetstream\HasProfilePhoto;

trait UserAccessors
{

    use HasProfilePhoto {
        getProfilePhotoUrlAttribute as getPhotoUrl;
    }

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
     * Return the user is admin.
     * @return bool
     */
    public function isAdmin(): bool
    {
        return (bool) $this->is_admin;
    }

    /**
     * Return the user isn't admin.
     * @return bool
     */
    public function isNotAdmin(): bool
    {
        return ! (bool) $this->is_admin;
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
        return $this?->roles->pluck('name')->toArray();
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

    public function grade()
    {
        return (int) mb_substr($this->name, 0, 1);
    }

    public function class()
    {
        return (int) mb_substr($this->name, 1, 2);
    }

    public function tester()
    {
        $tester = config('opinion-box.settings.selected_tester');

        if ($this->user?->isStuff()) {
            return true;
        }

        if (count($tester)) {
            return $this->grade() === $tester['grade'] && $this->class() === $tester['class'];
        }

        return true;
    }

}
