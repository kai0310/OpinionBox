<?php

namespace App\Traits;

use App\Exceptions\LackOfPermissionException;
use App\Models\User;

trait OnlyAdminCan
{
    /**
     * @throws LackOfPermissionException
     */
    public function adminCan(User $user): void
    {
        if ($user->isNotAdmin()) {
            throw LackOfPermissionException::onlyAdminCan();
        }
    }
}
