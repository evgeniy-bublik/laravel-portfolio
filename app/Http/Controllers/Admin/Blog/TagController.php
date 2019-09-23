<?php

namespace App\Http\Controllers\Admin\Blog;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use App\Http\Requests\Admin\Blog\Tag\{CreateRequest, UpdateRequest};
use App\Services\Admin\Blog\TagService;
use App\Repositories\Eloquent\Blog\TagRepository;

class TagController extends Controller
{
    /**
     * Tag blog service object.
     * 
     * @access protected
     * 
     * @var \App\Services\Admin\Blog\TagService $tagService
     */
    protected $tagService;

    /**
     * Constructor.
     * 
     * @param \App\Services\TagService $tagService Tag blog service class.
     * 
     * @return void
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    /**
     * Display blog tags page.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.blog.tag.index');
    }

    /**
     * Get datatable data tags.
     *
     * @param Illuminate\Http\Request                       $request Request object.
     * @param \App\Repositories\Eloquent\Blog\TagRepository $tagRepo Blog tag repository.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request, TagRepository $tagRepo)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = $tagRepo->getModel()->query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.blog.tag.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display blog tag create form.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.blog.tag.create');
    }

    /**
     * Create new blog tag.
     *
     * @param \App\Http\Requests\Admin\Blog\Tag\CreateRequest $request Form request.
     * @param \App\Repositories\Eloquent\Blog\TagRepository   $tagRepo Blog tag repository.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(CreateRequest $request, TagRepository $tagRepo)
    {
        $fields = $this->tagService->getStoreDataFromRequest($request);

        $tagRepo->create($fields);

        return redirect()->route('admin.blog.tags.index');
    }

    /**
     * Display blog tag edit form.
     *
     * @param Illuminate\Http\Request $request Request object.
     * @param \App\Models\Blog\Tag    $tag     Blog tag model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Tag $tag)
    {
        return view('admin.blog.tag.edit', compact('tag'));
    }

    /**
     * Update blog tag.
     *
     * @param \App\Http\Requests\Admin\Blog\Tag\UpdateRequest $request Form request.
     * @param \App\Models\Blog\Tag                            $tag     Blog tag model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(UpdateRequest $request, Tag $tag)
    {
        $fields = $this->tagService->getStoreDataFromRequest($request);

        $tag->update($fields);

        return redirect()->route('admin.blog.tags.index');
    }

    /**
     * Delete blog tag.
     *
     * @param Illuminate\Http\Request  $request Request object.
     * @param \App\Models\Blog\Tag     $tag     Blog tag model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.blog.tags.index');
    }
}
