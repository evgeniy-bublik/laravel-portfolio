<?php

namespace App\Http\Controllers\Admin\Blog;

use DataTables;
use App\Models\Blog\Post;
use App\Models\Blog\Category;
use App\Models\Blog\PostCategory;
use App\Models\Blog\Tag;
use App\Models\Blog\PostTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBlogPostCreateRequest;
use App\Http\Requests\AdminBlogPostUpdateRequest;
use App\Services\BlogService;

class PostController extends Controller
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
     * Display blog posts page.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.blog.post.index');
    }

    /**
     * Get datatable data posts.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return null|string JSON.
     */
    public function getDataTable(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = Post::query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.blog.post.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display blog post create form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.blog.post.create', [
            'listCategories' => $this->blogService->getCategoriesList(),
            'listTags' => $this->blogService->getListTags(),
        ]);
    }

    /**
     * Create new blog post.
     *
     * @param \App\Http\Requests\AdminBlogPostCreateRequest $request Form request.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(Request $request)
    {
        $this->blogService->saveBlogPost(
            $request->except(['_token', 'category_id', 'tags', 'image']),
            $request->category_id,
            $request->tags,
            $request->image
        );

        return redirect()->route('admin.blog.posts.index');
    }

    /**
     * Display blog post edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Blog\Post $post Blog post model.
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Post $post)
    {
        return view('admin.blog.post.edit', [
            'post' => $post,
            'listCategories' => $this->blogService->getCategoriesList(),
            'listTags' => $this->blogService->getListTags(),
        ]);
    }

    /**
     * Update blog post.
     *
     * @param \App\Http\Requests\AdminBlogPostUpdateRequest $request Form request.
     * @param \App\Models\Blog\Post $post Blog post model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(AdminBlogPostUpdateRequest $request, Post $post)
    {
        $this->blogService->updateBlogPost(
            $post,
            $request->except(['_token', 'category_id', 'tags', 'image']),
            $request->category_id,
            $request->tags,
            $request->image
        );

        return redirect()->route('admin.blog.posts.index');
    }

    /**
     * Delete blog post.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Blog\Post $post Blog post model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Post $post)
    {
        $post->delete();

        $this->blogService->deletePostImageDir($post->id);

        return redirect()->route('admin.blog.posts.index');
    }
}
