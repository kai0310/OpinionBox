<?php

namespace App\Contracts\Actions\Admin;

use App\Models\Role;
use App\Models\User;

interface DeleteRoles
{
    public function delete(Role $role, User $user);
}
