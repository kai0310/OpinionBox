<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private const TAKE_MAX_COUNT = 10;

    public function index()
    {
        return view('admin.index')->with(
            'posts', Post::where('is_checked', false)->paginate(self::TAKE_MAX_COUNT)
        );
    }
}
