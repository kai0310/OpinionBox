<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ShowAction extends Controller
{
    /**
     * Show user profile page.
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        return view('profile.me', compact('user'));
    }
}
