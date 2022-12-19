<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\View\View;

class ShowAnnouncementListAction extends Controller
{
    /**
     * Show announcements list.
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('announcement.index')
            ->with('announcements', Announcement::paginate(30));
    }
}
