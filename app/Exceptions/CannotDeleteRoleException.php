<?php

namespace App\Exceptions;

use Exception;

class CannotDeleteRoleException extends Exception
{
    public static function onlyAdminCan(): self
    {
        return new self(__('管理者以外は削除することはできません'));
    }
}
