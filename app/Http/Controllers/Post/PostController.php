<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Post\Tag;
use App\Models\Post\Category;
use App\Models\Post\PostUniqueView;
use App\Http\Requests\PostCommentRequest;
use App\Models\Post\Comment;

/**
 * Post controller.
 */
class PostController extends Controller
{
    /**
     * Display page with all posts.
     *
     * @param \Illuminate\Http\Request $request Request
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('post.index', [
            'posts' => Post::visible()->with(['comments' => function($query) { return $query->active(); }])->withCount(['comments' => function($query) { return $query->active(); }])->paginate(Post::LIMIT_POSTS_ON_PAGE),
            'listTags' => Tag::active()->get(),
            'activeTagId' => 0,
            'categories' => Category::active()->withCount(['posts' => function($query) { return $query->visible(); }])->get(),
            'activeCategoryId' => 0,
            'metaTitle' => 'Блог | ' . env('SITE_NAME', ''),
            'metaKeywords' => '',
            'metaDescription' => '',
        ]);
    }

    /**
     * Display page single post.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param string $slug Post slug.
     * @return \Illuminate\Support\Facades\View
     */
    public function item(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->visible()->with(['tags' => function($query) { return $query->active(); }, 'comments' => function($query) { return $query->active(); }])->withCount(['comments' => function($query) { return $query->active(); }])->firstOrFail();

        $post->increment('total_views');

        $ip = $request->ip();

        if (!PostUniqueView::where('ip', $ip)->where('post_id', $post->id)->count()) {
            PostUniqueView::create([
                'post_id' => $post->id,
                'ip' => $ip,
            ]);

            $post->increment('unique_views');
        }

        return view('post.item', [
            'post' => $post,
            'categories' => Category::active()->withCount(['posts' => function($query) { return $query->visible(); }])->get(),
        ]);
    }

    /**
     * Display page with posts by category.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param string $categorySlug Category slug.
     * @return \Illuminate\Support\Facades\View
     */
    public function byCategory(Request $request, $categorySlug)
    {
        $category = Category::active()->where('slug', $categorySlug)->firstOrFail();

        return view('post.index', [
            'posts' => $category->posts()->visible()->with(['comments' => function($query) { return $query->active(); }])->withCount(['comments' => function($query) { return $query->active(); }])->paginate(Post::LIMIT_POSTS_ON_PAGE),
            'listTags' => Tag::active()->get(),
            'activeTagId' => 0,
            'categories' => Category::active()->withCount(['posts' => function($query) { return $query->visible(); }])->get(),
            'activeCategoryId' => $category->id,
            'metaTitle' => $category->meta_title,
            'metaKeywords' => $category->meta_keywords,
            'metaDescription' => $category->meta_description,
        ]);
    }

    /**
     * Display page with posts by tag.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param string $tagSlug Tag slug.
     * @return \Illuminate\Support\Facades\View
     */
    public function byTag(Request $request, $tagSlug)
    {
        $tag = Tag::active()->where('slug', $tagSlug)->firstOrFail();

        return view('post.index', [
            'posts' => $tag->posts()->visible()->with(['comments' => function($query) { return $query->active(); }])->withCount(['comments' => function($query) { return $query->active(); }])->paginate(Post::LIMIT_POSTS_ON_PAGE),
            'listTags' => Tag::active()->get(),
            'activeTagId' => $tag->id,
            'categories' => Category::active()->withCount(['posts' => function($query) { return $query->visible(); }])->get(),
            'activeCategoryId' => 0,
            'metaTitle' => $tag->meta_title,
            'metaKeywords' => $tag->meta_keywords,
            'metaDescription' => $tag->meta_description,
        ]);
    }

    public function addComment(PostCommentRequest $request, Post $post)
    {
        $response = [
            'status' => false,
            'content' => view('modals.base_content', [
                'modalBodyText' => 'Произошла ошибка, попробуйте позже',
                'modalHeaderText' => 'Ошибка',
            ])->render(),
        ];

        $request[ 'post_id' ] = $post->id;

        $comment = new Comment();

        $comment->fill($request->all());
        $comment->post_id = $post->id;

        if ($comment->save()) {
            $response[ 'status' ] = true;
            $response[ 'content' ] = view('modals.base_content', [
                'modalBodyText' => 'Комментарий добавлен, однако появится он после модерации',
                'modalHeaderText' => 'Комментарий добавлен',
            ])->render();
        }

        return $response;
    }
}
