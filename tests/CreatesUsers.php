<?php

namespace Tests;

use App\Models\User;

trait CreatesUsers
{
    protected function login(array $attributes = []): User
    {
        $user = $this->createUser($attributes);

        $this->be($user);

        return $user;
    }

    protected function loginAsAdmin(): User
    {
        return $this->login([
            'is_admin' => true
        ]);
    }


    /**
     * Create a user account
     * @param array $attributes
     * @return User
     */
    protected function createUser(array $attributes = []): User
    {
        return User::factory()->create($attributes);
    }
}
