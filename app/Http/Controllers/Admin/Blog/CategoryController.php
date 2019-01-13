<?php

namespace App\Http\Controllers\Admin\Blog;

use DataTables;
use App\Models\Blog\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBlogCategoryCreateRequest;
use App\Http\Requests\AdminBlogCategoryUpdateRequest;
use App\Services\BlogService;

class CategoryController extends Controller
{
    /**
     * Blog service object.
     * 
     * @access protected
     * 
     * @var App\Services\BlogService $blogService
     */
    protected $blogService;

    /**
     * Constructor.
     * 
     * @param App\Services\BlogService $blogService Blog service class.
     * 
     * @return void
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display blog categories page.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.blog.category.index');
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
            ->addColumn('actions', 'admin.blog.category.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display blog category create form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.blog.category.create');
    }

    /**
     * Create new blog category.
     *
     * @param \App\Http\Requests\AdminBlogCategoryCreateRequest $request Form request.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(AdminBlogCategoryCreateRequest $request)
    {
        $this->blogService->saveBlogCategory($request->except(['_token']));

        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Display blog category edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Blog\Category $category Blog category model.
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Category $category)
    {
        return view('admin.blog.category.edit', compact('category'));
    }

    /**
     * Update blog category.
     *
     * @param \App\Http\Requests\AdminBlogCategoryUpdateRequest $request Form request.
     * @param \App\Models\Blog\Category $category Blog category model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(AdminBlogCategoryUpdateRequest $request, Category $category)
    {
        $this->blogService->updateBlogCategory($category, $request->except(['_token']));

        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Delete blog category.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Blog\Category $category Blog category model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->route('admin.blog.categories.index');
    }
}
