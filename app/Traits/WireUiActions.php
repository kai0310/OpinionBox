<?php

namespace App\Traits;

use WireUi\Actions\{Dialog, Notification};

trait WireUiActions
{
    public bool $confirmedWireUiDialog = false;

    public function notification(array $options = []): Notification
    {
        $notification = new Notification($this);

        if ($options) {
            return $notification->send($options);
        }

        return $notification;
    }

    public function dialog(array $options = []): Dialog
    {
        $dialog = new Dialog($this);

        if ($options) {
            return $dialog->show($options);
        }

        return $dialog;
    }

    public function confirmed(): bool
    {
        return $this->confirmedWireUiDialog = true;
    }
}
