<?php

namespace App\Actions\Admin;

use App\Exceptions\LackOfPermissionException;
use App\Models\User;
use App\Traits\OnlyAdminCan;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class ForceResetPassword
{
    use OnlyAdminCan;

    /**
     * @param User $user
     * @param User $target_user
     * @return array
     * @throws LackOfPermissionException
     */
    #[ArrayShape(['status' => "bool", 'new_password' => "string"])] public function handle(User $user, User $target_user): array
    {
        $this->adminCan($user);

        if ($user->is($target_user)) {
            throw LackOfPermissionException::cannotMyself();
        }

        $reset_password = Str::random(20);

        $status = $target_user->update([
            'password' => $reset_password,
            'email_verified_at' => null
        ]);

        return ['status' => $status, 'new_password' => $reset_password];
    }
}
