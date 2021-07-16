<?php

namespace App\Contracts\Actions\Admin;

use App\Models\Role;

interface UpdateRoles
{
    public function update(Role $role, array $input);
}
