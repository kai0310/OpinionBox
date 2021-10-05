<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManageUsersController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('admin.manage.user');
    }
}
