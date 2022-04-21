<?php

namespace App\Exceptions;

use Exception;

class LackOfPermissionException extends Exception
{
    public static function onlyAdminCan(): self
    {
        return new self(__('管理者以外は削除することはできません'));
    }

    public static function cannotMyself(): self
    {
        return new self(__('自分自身に対して行うことはできません'));
    }
}
