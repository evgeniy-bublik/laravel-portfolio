<?php

namespace App\Http\Controllers\Admin\Core;

use DataTables;
use App\Models\SiteCorePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Core\Page\UpdateRequest;
use App\Services\Admin\Core\PageService;
use App\Repositories\Eloquent\Core\PageRepository;

class PageController extends Controller
{
    /**
     * Admin page service object.
     * 
     * @access protected
     * 
     * @var App\Services\Admin\Core\PageService $pageService
     */
    protected $pageService;

    /**
     * Constructor.
     * 
     * @param App\Services\Admin\Core\PageService $pageService Admin page service class.
     * 
     * @return void
     */
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    /**
     * Display pages page.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.pages.index');
    }

    /**
     * Get datatable data pages.
     *
     * @param Illuminate\Http\Request                       $request  Request object.
     * @param App\Repositories\Eloquent\Core\PageRepository $pageRepo Page repository.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request, PageRepository $pageRepo)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = $pageRepo->getModel()->query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.pages.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display page edit form.
     *
     * @param Illuminate\Http\Request $request Request object.
     * @param App\Models\SiteCorePage $page    Site core page model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, SiteCorePage $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update seo page.
     *
     * @param App\Http\Requests\Admin\Core\Page\UpdateRequest $request Request object.
     * @param App\Models\SiteCorePage                         $page    Site core page model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function update(UpdateRequest $request, SiteCorePage $page)
    {
        $modelFields = $this->pageService->getUpdateFieldsFromRequest($request);

        $page->update($modelFields);

        return redirect()->route('admin.pages.index');
    }
}
