<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Post\Tag;
use App\Models\Post\Category;
use App\Models\Post\PostUniqueView;

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
            'posts' => Post::visible()->active()->with(['comments' => function($query) { return $query->active(); }])->withCount(['comments' => function($query) { return $query->active(); }])->paginate(Post::LIMIT_POSTS_ON_PAGE),
            'listTags' => Tag::active()->get(),
            'activeTagId' => 0,
            'categories' => Category::active()->withCount(['posts' => function($query) { return $query->visible()->active(); }])->get(),
            'activeCategoryId' => 0,
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
        $post = Post::where('slug', $slug)->visible()->active()->with(['tags' => function($query) { return $query->active(); }, 'comments' => function($query) { return $query->active(); }])->withCount(['comments' => function($query) { return $query->active(); }])->firstOrFail();

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
            'categories' => Category::active()->withCount(['posts' => function($query) { return $query->visible()->active(); }])->get(),
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
            'posts' => $category->posts()->visible()->active()->with(['comments' => function($query) { return $query->active(); }])->withCount(['comments' => function($query) { return $query->active(); }])->paginate(Post::LIMIT_POSTS_ON_PAGE),
            'listTags' => Tag::active()->get(),
            'activeTagId' => 0,
            'categories' => Category::active()->withCount(['posts' => function($query) { return $query->visible()->active(); }])->get(),
            'activeCategoryId' => $category->id,
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
            'posts' => $tag->posts()->visible()->active()->with(['comments' => function($query) { return $query->active(); }])->withCount(['comments' => function($query) { return $query->active(); }])->paginate(Post::LIMIT_POSTS_ON_PAGE),
            'listTags' => Tag::active()->get(),
            'activeTagId' => $tag->id,
            'categories' => Category::active()->withCount(['posts' => function($query) { return $query->visible()->active(); }])->get(),
            'activeCategoryId' => 0,
        ]);
    }
}
