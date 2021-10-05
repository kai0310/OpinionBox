<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexAction extends Controller
{
    /**
     * Handle the incoming request.
     * @return View
     */
    public function __invoke(): View
    {
        return view('admin.index');
    }
}
