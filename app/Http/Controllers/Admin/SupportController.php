<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    /**
     * Display support messages.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $supportMessages = Support::paginate();

        return view('admin.support.index', compact('supportMessages'));
    }

    /**
     * View support message.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Support $message Support message model.
     * @return \Illuminate\Support\Facades\View
     */
    public function view(Request $request, Support $support)
    {
        return view('admin.support.view');
    }

    /**
     * Delete support message.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Support $message Support message model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Support $message)
    {
        $message->delete();

        return redirect()->route('admin.support.messages.index');
    }
}
