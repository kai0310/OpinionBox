<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class ShowAnnouncementListAction extends Controller
{
    public function __invoke()
    {
        return view('announcement.index')
            ->with('announcements', Announcement::paginate(30));
    }
}
