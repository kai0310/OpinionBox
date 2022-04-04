<?php

namespace App\Exceptions;

use Exception;

class CannotDeletePostException extends Exception
{
    public static function notYourPost(): self
    {
        return new self('他人の投稿を削除することはできません');
    }
}
