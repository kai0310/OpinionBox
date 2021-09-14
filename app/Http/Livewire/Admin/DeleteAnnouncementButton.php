<?php

namespace App\Http\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;

class DeleteAnnouncementButton extends Component
{
    public function render(): View
    {
        return view('livewire.admin.delete-announcement-button');
    }
}
