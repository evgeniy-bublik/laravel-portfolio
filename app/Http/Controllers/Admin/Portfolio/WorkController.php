<?php

namespace App\Http\Controllers\Admin\Portfolio;

use DataTables;
use App\Models\Portfolio\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPortfolioWorkCreateRequest;
use App\Http\Requests\AdminPortfolioWorkUpdateRequest;
use App\Services\PortfolioService;

/**
 * Admin portfolio work controller.
 */
class WorkController extends Controller
{
    /**
     * Portfolio service object.
     * 
     * @access protected
     * 
     * @var App\Services\PortfolioService $portfolioService
     */
    protected $portfolioService;

    /**
     * Constructor.
     * 
     * @param App\Services\PortfolioService $portfolioService Portfolio service class.
     * 
     * @return void
     */
    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
    }

    /**
     * Display portfolio works page.
     *
     * @param \Illuminate\Http\Request $request Request.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.portfolio.work.index');
    }

    /**
     * Get datatable data works.
     *
     * @param \Illuminate\Http\Request $request Request.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = Work::query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.portfolio.work.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display portfolio work create form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.portfolio.work.create', [
            'listCategories' => $this->portfolioService->getListCategories(),
        ]);
    }

    /**
     * Create new portfolio work.
     *
     * @param \App\Http\Requests\AdminPortfolioWorkCreateRequest $request Form request.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(AdminPortfolioWorkCreateRequest $request)
    {
        $this->portfolioService->createPortfolioWork($request->only([
            'category_id',
            'name',
            'slug',
            'description',
            'url',
            'date',
            'technologies',
            'active',
            'meta_title',
            'meta_keywords',
            'meta_description',
        ]), $request->file('image'));

        return redirect()->route('admin.portfolio.works.index');
    }

    /**
     * Display portfolio work edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Portfolio\Work $work Portfolio work model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Work $work)
    {
        return view('admin.portfolio.work.edit', [
            'work' => $work,
            'listCategories' => $this->portfolioService->getListCategories(),
        ]);
    }

    /**
     * Update portfolio work.
     *
     * @param \App\Http\Requests\AdminPortfolioWorkUpdateRequest $request Form request.
     * @param \App\Models\Portfolio\Work $work Portfolio work model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(AdminPortfolioWorkUpdateRequest $request, Work $work)
    {
        $this->portfolioService->updatePortfolioWork($work, $request->only([
            'category_id',
            'name',
            'slug',
            'description',
            'url',
            'date',
            'technologies',
            'active',
            'meta_title',
            'meta_keywords',
            'meta_description',
        ]), $request->file('image'));

        return redirect()->route('admin.portfolio.works.index');
    }

    /**
     * Delete portfolio work.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Portfolio\Work $work Portfolio work model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Work $work)
    {
        $work->delete();

        $this->portfolioService->deleteWorkImageDir($work->id);

        return redirect()->route('admin.portfolio.works.index');
    }
}
