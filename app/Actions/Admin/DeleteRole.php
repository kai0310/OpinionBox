<?php

namespace App\Actions\Admin;

use App\Models\Role;
use App\Contracts\Actions\Admin\DeleteRoles;

class DeleteRole implements DeleteRoles
{
    public function delete(Role $role)
    {
        return $role->delete();
    }
}
