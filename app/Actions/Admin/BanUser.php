<?php

namespace App\Actions\Admin;

use App\Exceptions\LackOfPermissionException;
use App\Models\User;
use App\Traits\OnlyAdminCan;

class BanUser
{
    use OnlyAdminCan;

    /**
     * @param User $user
     * @param User $target_user
     * @return void
     * @throws LackOfPermissionException
     */
    public function handle(User $user, User $target_user): void
    {
        $this->adminCan($user);

        if ($user->is($target_user)) {
            throw LackOfPermissionException::cannotMyself();
        }

        $target_user->update([
            'banned_at' => $target_user->isBanned() ? null : now(),
        ]);
    }

}
