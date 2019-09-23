<?php

namespace App\Http\Controllers\Admin\Blog;

use DataTables;
use App\Models\Blog\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Category\{CreateRequest, UpdateRequest};
use App\Services\Admin\Blog\CategoryService;
use App\Repositories\Eloquent\Blog\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Category blog service object.
     * 
     * @access protected
     * 
     * @var App\Services\Admin\Blog\CategoryService $categoryService
     */
    protected $categoryService;

    /**
     * Constructor.
     * 
     * @param App\Services\Admin\Blog\CategoryService $categoryService Category blog service class.
     * 
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display blog categories page.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.blog.category.index');
    }

    /**
     * Get datatable data categories.
     *
     * @param Illuminate\Http\Request                           $request      Request object.
     * @param App\Repositories\Eloquent\Blog\CategoryRepository $categoryRepo Blog category repository.
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
            ->addColumn('actions', 'admin.blog.category.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display blog category create form.
     *
     * @param Illuminate\Http\Request $request Request.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.blog.category.create');
    }

    /**
     * Create new blog category.
     *
     * @param App\Http\Requests\Admin\Blog\Category\CreateRequest $request      Form request.
     * @param App\Repositories\Eloquent\Blog\CategoryRepository   $categoryRepo Blog category repository.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(CreateRequest $request, CategoryRepository $categoryRepo)
    {
        $fields = $this->categoryService->getStoreDataFromRequest($request);

        $categoryRepo->create($fields);

        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Display blog category edit form.
     *
     * @param Illuminate\Http\Request  $request  Request object.
     * @param App\Models\Blog\Category $category Blog category model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Category $category)
    {
        return view('admin.blog.category.edit', compact('category'));
    }

    /**
     * Update blog category.
     *
     * @param App\Http\Requests\Admin\Blog\Category\UpdateRequest $request  Form request.
     * @param App\Models\Blog\Category                            $category Blog category model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $fields = $this->categoryService->getStoreDataFromRequest($request);

        $category->update($fields);

        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Delete blog category.
     *
     * @param Illuminate\Http\Request  $request  Request object.
     * @param App\Models\Blog\Category $category Blog category model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->route('admin.blog.categories.index');
    }
}
