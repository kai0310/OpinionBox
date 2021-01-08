<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowAction extends Controller
{
    public function __invoke($id)
    {
        return view('profile.me')->with(
            'user', User::where('name', $id)->firstOrFail()
        );
    }
}
