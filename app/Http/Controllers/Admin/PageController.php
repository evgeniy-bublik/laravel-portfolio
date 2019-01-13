<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\SiteCorePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPageUpdateRequest;
use App\Services\AdminService;

class PageController extends Controller
{
    /**
     * Admin service object.
     * 
     * @access protected
     * 
     * @var App\Services\AdminService $adminService
     */
    protected $adminService;

    /**
     * Constructor.
     * 
     * @param App\Services\AdminService $adminService Admin service class.
     * 
     * @return void
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Display pages page.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.pages.index');
    }

    /**
     * Get datatable data pages.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return null|string JSON.
     */
    public function getDataTable(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = SiteCorePage::query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.pages.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display page edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\SiteCorePage $page Site core page model.
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, SiteCorePage $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update seo page.
     *
     * @param \App\Http\Requests\AdminPageUpdateRequest $request Request.
     * @param \App\Models\SiteCorePage $page Site core page model.
     * @return \Illuminate\Support\Facades\View
     */
    public function update(AdminPageUpdateRequest $request, SiteCorePage $page)
    {
        $this->adminService->updateSiteCorePageMetaInformation($page, $request->only([
            'meta_title',
            'meta_keywords',
            'meta_description',
        ]));

        return redirect()->route('admin.pages.index');
    }
}
