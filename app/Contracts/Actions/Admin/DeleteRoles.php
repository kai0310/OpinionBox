<?php

namespace App\Contracts\Actions\Admin;

use App\Models\Role;

interface DeleteRoles
{
    public function delete(Role $role);
}
