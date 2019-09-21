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
use App\Http\Requests\Admin\Blog\Post\{CreateRequest, UpdateRequest};
use App\Services\Admin\Blog\PostService;
use App\Repositories\Eloquent\Blog\{PostRepository, CategoryRepository, TagRepository};

class PostController extends Controller
{
    /**
     * Blog post service object.
     * 
     * @access protected
     * 
     * @var \App\Services\Admin\Blog\PostService $postService
     */
    protected $postService;

    /**
     * Constructor.
     * 
     * @param \App\Services\Admin\Blog\PostService $postService Blog service class.
     * 
     * @return void
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display blog posts page.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.blog.post.index');
    }

    /**
     * Get datatable data posts.
     *
     * @param Illuminate\Http\Request                        $request  Request object.
     * @param \App\Repositories\Eloquent\Blog\PostRepository $postRepo Blog post repository.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request, PostRepository $postRepo)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = $postRepo->getModel()->query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.blog.post.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display blog post create form.
     *
     * @param Illuminate\Http\Request                            $request      Request object.
     * @param \App\Repositories\Eloquent\Blog\CategoryRepository $categoryRepo Blog category repository.
     * @param \App\Repositories\Eloquent\Blog\TagRepository      $tagRepo      Blog tag repository.
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function create(Request $request, CategoryRepository $categoryRepo, TagRepository $tagRepo)
    {
        return view('admin.blog.post.create', [
            'listCategories' => $categoryRepo->collection(),
            'listTags'       => $tagRepo->collection(),
        ]);
    }

    /**
     * Create new blog post.
     *
     * @param \App\Http\Requests\Admin\Blog\Post\CreateRequest $request  Form request.
     * @param \App\Repositories\Eloquent\Blog\PostRepository   $postRepo Blog post repository.
     * @param \App\Repositories\Eloquent\Blog\TagRepository    $tagRepo  Blog tag repository.
     * 
     * @return Illuminate\Support\Facades\Redirect
     */
    public function store(CreateRequest $request, PostRepository $postRepo, TagRepository $tagRepo)
    {
        $fields = $this->postService->getStoreDataFromRequest($request);
        $image  = $this->postService->getImageFromRequest($request);

        $post = $postRepo->create($fields);

        if ($image) {
            $this->postService->saveImage($post->id, $image);
        }

        $tagsIds       = $this->postService->getTagIdsFromRequest($request, $tagRepo);
        $categoriesIds = $this->postService->getCategoriesIdsFromRequest($request);

        $post->tags()->sync($tagsIds);
        $post->categories()->sync($categoriesIds);

        return redirect()->route('admin.blog.posts.index');
    }

    /**
     * Display blog post edit form.
     *
     * @param Illuminate\Http\Request                            $request      Request object.
     * @param \App\Models\Blog\Post                              $post         Blog post model.
     * @param \App\Repositories\Eloquent\Blog\CategoryRepository $categoryRepo Blog category repository.
     * @param \App\Repositories\Eloquent\Blog\TagRepository      $tagRepo      Blog tag repository.
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Post $post, CategoryRepository $categoryRepo, TagRepository $tagRepo)
    {
        return view('admin.blog.post.edit', [
            'post'           => $post,
            'listCategories' => $categoryRepo->collection(),
            'listTags'       => $tagRepo->collection()
        ]);
    }

    /**
     * Update blog post.
     *
     * @param \App\Http\Requests\Admin\Blog\Post\UpdateRequest $request Form request.
     * @param \App\Models\Blog\Post                            $post    Blog post model.
     * @param \App\Repositories\Eloquent\Blog\TagRepository    $tagRepo Blog tag repository.
     * 
     * @return Illuminate\Support\Facades\Redirect
     */
    public function update(UpdateRequest $request, Post $post, TagRepository $tagRepo)
    {
        $fields = $this->postService->getStoreDataFromRequest($request);
        $image  = $this->postService->getImageFromRequest($request);

        $post->update($fields);

        if ($image) {
            $this->postService->deleteImageDir($post->id);
            $this->postService->saveImage($post->id, $image);
        }

        $tagsIds       = $this->postService->getTagIdsFromRequest($request, $tagRepo);
        $categoriesIds = $this->postService->getCategoriesIdsFromRequest($request);

        $post->tags()->sync($tagsIds);
        $post->categories()->sync($categoriesIds);

        return redirect()->route('admin.blog.posts.index');
    }

    /**
     * Delete blog post.
     *
     * @param Illuminate\Http\Request $request Request object.
     * @param \App\Models\Blog\Post   $post    Blog post model.
     * 
     * @return Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Post $post)
    {
        $post->delete();

        $this->postService->deleteImageDir($post->id);

        return redirect()->route('admin.blog.posts.index');
    }
    
}
