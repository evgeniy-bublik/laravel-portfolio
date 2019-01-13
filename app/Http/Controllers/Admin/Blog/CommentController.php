<?php

namespace App\Http\Controllers\Admin\Blog;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Comment;
use App\Models\Blog\Post;
use App\Http\Requests\AdminCommentUpdateRequest;
use App\Services\BlogService;
use Freshbitsweb\Laratables\Laratables;

class CommentController extends Controller
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
     * Display post comments.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.blog.comment.index');
    }

    /**
     * Get datatable post comments.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return null|string JSON.
     */
    public function getDataTable(Request $request)
    {       
        if (!$request->ajax()) {
            return null;
        }

        $model = Comment::with('post');

        return DataTables::eloquent($model)
            ->addColumn('actions', 'admin.blog.comment.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();

        return Laratables::recordsOf(Comment::class);
    }

    /**
     * Display blog comment edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Blog\Comment $comment Comment model.
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Comment $comment)
    {
        return view('admin.blog.comment.edit', compact('comment'));
    }

     /**
     * Update blog comment.
     *
     * @param \App\Http\Requests\AdminCommentUpdateRequest $request Request.
     * @param \App\Models\Blog\Comment $comment Comment model.
     * @return \Illuminate\Support\Facades\View
     */
    public function update(AdminCommentUpdateRequest $request, Comment $comment)
    {
        $this->blogService->updateBlogComment($comment, $request->only([
            'text',
            'active',
        ]));

        return redirect()->route('admin.blog.comments.index');
    }

    /**
     * Delete post comment.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\Blog\Comment $comment Comment model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.blog.comments.index');
    }
}
