<?php

namespace App\Http\Controllers\Admin\Portfolio;

use DataTables;
use App\Models\Portfolio\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPortfolioCategoryRequest;
use App\Services\PortfolioService;

/**
 * Admin portfolio category controller.
 */
class CategoryController extends Controller
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
     * Display portfolio categories page.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.portfolio.category.index');
    }

    /**
     * Get datatable data categories.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return null|string JSON.
     */
    public function getDataTable(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = Category::query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.portfolio.category.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display portfolio category create form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.portfolio.category.create');
    }

    /**
     * Create new portfolio category.
     *
     * @param \App\Http\Requests\AdminPortfolioCategoryRequest $request Form request.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(AdminPortfolioCategoryRequest $request)
    {
        $this->portfolioService->createPortfolioCategory($request->only(['name', 'display_order', 'active']));

        return redirect()->route('admin.portfolio.categories.index');
    }

    /**
     * Display portfolio category edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Portfolio\Category $category Portfolio category model.
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Category $category)
    {
        return view('admin.portfolio.category.edit', compact('category'));
    }

    /**
     * Update portfolio category.
     *
     * @param \App\Http\Requests\AdminPortfolioCategoryRequest $request Form request.
     * @param \App\Models\Portfolio\Category $category Portfolio category model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(AdminPortfolioCategoryRequest $request, Category $category)
    {
        $this->portfolioService->createPortfolioCategory($category, $request->only(['name', 'display_order', 'active']));

        return redirect()->route('admin.portfolio.categories.index');
    }

    /**
     * Delete portfolio category.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Portfolio\Category $category Portfolio category model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->route('admin.portfolio.categories.index');
    }
}
