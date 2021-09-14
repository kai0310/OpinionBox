<?php

namespace App\Http\Livewire\Admin;

use App\Models\Announcement;
use Illuminate\View\View;
use Livewire\Component;

class AnnouncementsTable extends Component
{
    public function render(): View
    {
        return view('livewire.admin.announcements-table')
            ->with('announcements', Announcement::paginate(30));
    }
}
