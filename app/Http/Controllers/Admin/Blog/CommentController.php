<?php

namespace App\Http\Controllers\Admin\Blog;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Comment\UpdateRequest;
use App\Services\Admin\Blog\CommentService;
use App\Repositories\Eloquent\Blog\CommentRepository;

class CommentController extends Controller
{
    /**
     * Blog service object.
     * 
     * @access protected
     * 
     * @var \App\Services\Admin\Blog\CommentService $commentService.
     */
    protected $commentService;

    /**
     * Constructor.
     * 
     * @param \App\Services\Admin\Blog\CommentService $commentService Blog service class.
     * 
     * @return void
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Display post comments.
     *
     * @param Illuminate\Http\Request $request Request.
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.blog.comment.index');
    }

    /**
     * Get datatable post comments.
     *
     * @param Illuminate\Http\Request                           $request     Request.
     * @param \App\Repositories\Eloquent\Blog\CommentRepository $commentRepo Blog comment repository.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request, CommentRepository $commentRepo)
    {       
        if (!$request->ajax()) {
            return null;
        }

        $model = $commentRepo->getModel()->with('post');

        return DataTables::eloquent($model)
            ->addColumn('actions', 'admin.blog.comment.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display blog comment edit form.
     *
     * @param Illuminate\Http\Request  $request Request object.
     * @param \App\Models\Blog\Comment $comment Comment model.
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Comment $comment)
    {
        return view('admin.blog.comment.edit', compact('comment'));
    }

     /**
     * Update blog comment.
     *
     * @param \App\Http\Requests\Admin\Blog\Comment\UpdateRequest $request Request object.
     * @param \App\Models\Blog\Comment                            $comment Comment model.
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function update(UpdateRequest $request, Comment $comment)
    {
        $comment->update($this->commentService->getStoreDataFromRequest($request));

        return redirect()->route('admin.blog.comments.index');
    }

    /**
     * Delete post comment.
     *
     * @param Illuminate\Http\Request  $request Request object.
     * @param \App\Models\Blog\Comment $comment Comment model.
     * 
     * @return Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.blog.comments.index');
    }
}
