<?php

namespace App\Actions\Admin;

use App\Contracts\Actions\Admin\DeleteRoles;
use App\Exceptions\CannotDeleteRoleException;
use App\Models\Role;
use App\Models\User;

class DeleteRole implements DeleteRoles
{
    /**
     * @param  Role  $role
     * @param  User  $user
     * @return bool|null
     *
     * @throws CannotDeleteRoleException
     */
    public function delete(Role $role, User $user): ?bool
    {
        if ($user->isNotAdmin()) {
            throw CannotDeleteRoleException::onlyAdminCan();
        }

        $this->deleteBelongsUsers($role);

        return $role->delete();
    }

    public function deleteBelongsUsers(Role $role): void
    {
        $role->users()->detach();
    }
}
