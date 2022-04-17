<?php

namespace App\Traits;

use WireUi\Support\{Dialog, Notification};

trait WireUiActions
{
    public bool $confirmedWireUiDialog = false;

    public function notification(): Notification
    {
        return new Notification($this);
    }

    public function dialog(): Dialog
    {
        return new Dialog($this);
    }

    public function confirmed(): bool
    {
        return $this->confirmedWireUiDialog = true;
    }
}
