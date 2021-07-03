<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowAction extends Controller
{
    /**
     * ユーザページを表示
     * @param User $user
     */
    public function __invoke(User $user)
    {
        return view('profile.me', compact('user'));
    }
}
