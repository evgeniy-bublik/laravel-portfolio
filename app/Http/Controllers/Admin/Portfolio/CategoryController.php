<?php

namespace App\Http\Controllers\Admin\Portfolio;

use DataTables;
use App\Models\Portfolio\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Portfolio\Category\StoreRequest;
use App\Services\Admin\Portfolio\CategoryService;
use App\Repositories\Eloquent\Portfolio\CategoryRepository;

/**
 * Admin portfolio category controller.
 */
class CategoryController extends Controller
{
    /**
     * Admin portfolio category service.
     * 
     * @access protected
     * 
     * @var App\Services\Admin\Portfolio\CategoryService $categoryService.
     */
    protected $categoryService;

    /**
     * Constructor.
     * 
     * @param App\Services\Admin\Portfolio\CategoryService $categoryService Admin portfolio category service.
     * 
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display portfolio categories page.
     *
     * @param Illuminate\Http\Request $request Request.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.portfolio.category.index');
    }

    /**
     * Get datatable data categories.
     *
     * @param Illuminate\Http\Request                       $request      Request object.
     * @param App\Repositories\Portfolio\CategoryRepository $categoryRepo Portfolio category repository.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request, CategoryRepository $categoryRepo)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = $categoryRepo->getModel()->query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.portfolio.category.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display portfolio category create form.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.portfolio.category.create');
    }

    /**
     * Create new portfolio category.
     *
     * @param App\Http\Requests\Admin\Portfolio\Category\StoreRequest $request      Form request.
     * @param App\Repositories\Portfolio\CategoryRepository           $categoryRepo Portfolio category repository.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(StoreRequest $request, CategoryRepository $categoryRepo)
    {
        $categoryData = $this->categoryService->getStoreDataFromRequest($request);

        $categoryRepo->create($categoryData);

        return redirect()->route('admin.portfolio.categories.index');
    }

    /**
     * Display portfolio category edit form.
     *
     * @param Illuminate\Http\Request       $request  Request object.
     * @param App\Models\Portfolio\Category $category Portfolio category model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Category $category)
    {
        return view('admin.portfolio.category.edit', compact('category'));
    }

    /**
     * Update portfolio category.
     *
     * @param App\Http\Requests\Admin\Portfolio\Category\StoreRequest $request  Form request.
     * @param App\Models\Portfolio\Category                           $category Portfolio category model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(StoreRequest $request, Category $category)
    {
        $categoryData = $this->categoryService->getStoreDataFromRequest($request);

        $category->update($categoryData);

        return redirect()->route('admin.portfolio.categories.index');
    }

    /**
     * Delete portfolio category.
     *
     * @param Illuminate\Http\Request       $request  Request object.
     * @param App\Models\Portfolio\Category $category Portfolio category model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->route('admin.portfolio.categories.index');
    }
}
