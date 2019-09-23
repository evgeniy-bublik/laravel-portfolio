<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Models\Blog\PostUniqueView;
use App\Http\Requests\AddCommentRequest;
use App\Services\PostService;
use App\Repositories\Eloquent\Core\{PageRepository};
use App\Repositories\Eloquent\Blog\{PostRepository, CategoryRepository, TagRepository, CommentRepository};
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Post controller.
 */
class PostController extends Controller
{
    /**
     * Blog service.
     *
     * @access private
     * 
     * @var App\Services\PostService $postService
     */
    private $postService;

    /**
     * {$inheritdoc}
     *
     * @return void
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display page with all posts.
     *
     * @param Illuminate\Http\Request                           $request      Request object.
     * @param App\Repositories\Eloquent\Blog\PostRepository     $postRepo     Post repository.
     * @param App\Repositories\Eloquent\Blog\CategoryRepository $categoryRepo Post category repository.
     * @param App\Repositories\Eloquent\Blog\TagRepository      $tagRepo      Post tag repository.
     * @param App\Repositories\Eloquent\Core\PageRepository     $pageRepo     Core page repository.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(
        Request $request,
        PostRepository $postRepo,
        CategoryRepository $categoryRepo,
        TagRepository $tagRepo,
        PageRepository $pageRepo
    ) {
        $page    = $pageRepo->getBlogIndexPage();
        $metaDto = ($page) ? $this->postService->getMetaFromPage($page) : $this->postService->getEmptyMetaObject();

        return view('post.index', [
            'posts'            => $postRepo->getVisiblePostsWithComments(),
            'listTags'         => $tagRepo->getActiveTags(),
            'activeTagId'      => 0,
            'categories'       => $categoryRepo->getActiveCategoriesWithCountPosts(),
            'activeCategoryId' => 0,
            'metaDto'          => $metaDto,
        ]);
    }

    /**
     * Display page single post.
     *
     * @param Illuminate\Http\Request                           $request      Request object.
     * @param App\Repositories\Eloquent\Blog\PostRepository     $postRepo     Post repository.
     * @param App\Repositories\Eloquent\Blog\CategoryRepository $categoryRepo Post category repository.
     * @param string                                            $slug         Post slug.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function item(
        Request $request,
        PostRepository $postRepo,
        CategoryRepository $categoryRepo,
        $slug
    ) {
        $post    = $postRepo->findPostBySlugWithTagsAndCommentsOrFail($slug);
        $ip      = $request->ip();
        $metaDto = $this->postService->getMetaDtoFromModel($post);

        $post->increment('total_views');

        if (!PostUniqueView::where('ip', $ip)->where('post_id', $post->id)->count()) {
            PostUniqueView::create([
                'post_id' => $post->id,
                'ip'      => $ip,
            ]);

            $post->increment('unique_views');
        }

        return view('post.item', [
            'post'       => $post,
            'categories' => $categoryRepo->getActiveCategoriesWithCountPosts(),
            'metaDto'    => $metaDto,
        ]);
    }

    /**
     * Display page with posts by category.
     *
     * @param Illuminate\Http\Request                           $request      Request object.
     * @param App\Repositories\Eloquent\Blog\PostRepository     $postRepo     Post repository.
     * @param App\Repositories\Eloquent\Blog\CategoryRepository $categoryRepo Post category repository.
     * @param App\Repositories\Eloquent\Blog\TagRepository      $tagRepo      Post tag repository.
     * @param string                                            $categorySlug Category slug.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function byCategory(
        Request $request,
        PostRepository $postRepo,
        CategoryRepository $categoryRepo,
        TagRepository $tagRepo,
        $categorySlug
    ) {
        $category = $categoryRepo->findBySlugOrFail($categorySlug);
        $metaDto  = $this->postService->getMetaDtoFromModel($category);

        return view('post.index', [
            'posts'            => $postRepo->getPostByRelatedModel($category),
            'listTags'         => $tagRepo->getActiveTags(),
            'activeTagId'      => 0,
            'categories'       => $categoryRepo->getActiveCategoriesWithCountPosts(),
            'activeCategoryId' => $category->id,
            'metaDto'          => $metaDto,
        ]);
    }

    /**
     * Display page with posts by tag.
     *
     * @param Illuminate\Http\Request                           $request      Request object.
     * @param App\Repositories\Eloquent\Blog\PostRepository     $postRepo     Post repository.
     * @param App\Repositories\Eloquent\Blog\CategoryRepository $categoryRepo Post category repository.
     * @param App\Repositories\Eloquent\Blog\TagRepository      $tagRepo      Post tag repository.
     * @param string                                            $tagSlug      Tag slug.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function byTag(
        Request $request,
        PostRepository $postRepo,
        CategoryRepository $categoryRepo,
        TagRepository $tagRepo,
        $tagSlug
    ) {
        $tag     = $tagRepo->findBySlugOrFail($tagSlug);
        $metaDto = $this->postService->getMetaDtoFromModel($tag);

        return view('post.index', [
            'posts'            => $postRepo->getPostByRelatedModel($tag),
            'listTags'         => $tagRepo->getActiveTags(),
            'activeTagId'      => $tag->id,
            'categories'       => $categoryRepo->getActiveCategoriesWithCountPosts(),
            'activeCategoryId' => 0,
            'metaDto'          => $metaDto,
        ]);
    }

    /**
     * Add comment to post.
     * 
     * @param App\Http\Requests\AddCommentRequest              $request     Form request.
     * @param App\Repositories\Eloquent\Blog\PostRepository    $postRepo    Post repository.
     * @param App\Repositories\Eloquent\Blog\CommentRepository $commentRepo Post comment repository.
     * @param int                                              $postId      Post id.
     * 
     * @return string JSON string
     */
    public function addComment(
        AddCommentRequest $request,
        PostRepository $postRepo,
        CommentRepository $commentRepo,
        $postId
    ) {
        $response = [
            'status'  => false,
            'content' => view('modals.base_content', [
                'modalBodyText'   => 'Произошла ошибка, попробуйте позже',
                'modalHeaderText' => 'Ошибка',
            ])->render(),
        ];

        try {
            $post = $postRepo->findByIdOrFail($postId);
        } catch (ModelNotFoundException $e) {
            return response()->json($response);
        }

        $request->merge(['post_id' => $postId]);

        $commentData = $this->postService->getFieldsForCommentFromRequest($request);

        if ($commentRepo->create($commentData)) {
            $response[ 'status' ]  = true;
            $response[ 'content' ] = view('modals.base_content', [
                'modalBodyText'   => 'Комментарий добавлен, однако появится он после модерации',
                'modalHeaderText' => 'Комментарий добавлен',
            ])->render();
        }

        return response()->json($response);
    }
}
