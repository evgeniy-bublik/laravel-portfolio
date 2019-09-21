<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Admin index controller.
 */
class IndexController extends Controller
{
    /**
     * Display index page.
     *
     * @param \Illuminate\Http\Request $request Request
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.index');
    }
}
