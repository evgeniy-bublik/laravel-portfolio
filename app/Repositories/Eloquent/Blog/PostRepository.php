<?php

namespace App\Repositories\Eloquent\Blog;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return string
     */
    public function getModelClass()
    {
        return Post::class;
    }

    /**
     * Get collection visible posts with comments.
     * 
     * @return
     */
    public function getVisiblePostsWithComments()
    {
        return $this->model->visible()->with([
            'comments' => function($query) { return $query->active(); }
        ])->withCount([
            'comments' => function($query) { return $query->active(); }
        ])->paginate(Post::LIMIT_POSTS_ON_PAGE);
    }

    /**
     * Find post by slug with tags and comments or fail.
     * 
     * @param string $slug Post slug.
     * 
     * @return
     */
    public function findPostBySlugWithTagsAndCommentsOrFail($slug)
    {
        return Post::where('slug', $slug)->visible()->with([
            'tags' => function($query) { return $query->active(); },
            'comments' => function($query) { return $query->active(); }
        ])->withCount([
            'comments' => function($query) { return $query->active(); }
        ])->firstOrFail();
    }

    public function getPostByRelatedModel(Model $model)
    {
        return $model->posts()->visible()->with([
            'comments' => function($query) { return $query->active(); }
        ])->withCount([
            'comments' => function($query) { return $query->active(); }
        ])->paginate(Post::LIMIT_POSTS_ON_PAGE);
    }

    public function findByIdOrFail($id)
    {
        return $this->model->visible()->where('id', $id)->firstOrFail();
    }
}