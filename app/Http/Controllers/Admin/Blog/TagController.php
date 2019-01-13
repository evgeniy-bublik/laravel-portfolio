<?php

namespace App\Http\Controllers\Admin\Blog;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use App\Http\Requests\AdminBlogTagCreateRequest;
use App\Http\Requests\AdminBlogTagUpdateRequest;
use App\Services\BlogService;

class TagController extends Controller
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
     * Display blog tags page.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.blog.tag.index');
    }

    /**
     * Get datatable data tags.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return null|string JSON.
     */
    public function getDataTable(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = Tag::query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.blog.tag.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display blog tag create form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.blog.tag.create');
    }

    /**
     * Create new blog tag.
     *
     * @param \App\Http\Requests\AdminBlogTagCreateRequest $request Form request.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(AdminBlogTagCreateRequest $request)
    {
        $this->blogService->saveBlogTag($request->except(['_token']));

        return redirect()->route('admin.blog.tags.index');
    }

    /**
     * Display blog tag edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Blog\Tag $tag Blog tag model.
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Tag $tag)
    {
        return view('admin.blog.tag.edit', compact('tag'));
    }

    /**
     * Update blog tag.
     *
     * @param \App\Http\Requests\AdminBlogTagUpdateRequest $request Form request.
     * @param \App\Models\Blog\Tag $tag Blog tag model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(AdminBlogTagUpdateRequest $request, Tag $tag)
    {
        $this->blogService->updateBlogTag($tag, $request->except(['_token']));

        return redirect()->route('admin.blog.tags.index');
    }

    /**
     * Delete blog tag.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Blog\Tag $tag Blog tag model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.blog.tags.index');
    }
}
