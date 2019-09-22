<?php

namespace App\Repositories\Eloquent\Blog;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Blog\Category;

class CategoryRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return string
     */
    public function getModelClass()
    {
        return Category::class;
    }

    /**
     * Get active categories with count posts.
     * 
     * @return
     */
    public function getActiveCategoriesWithCountPosts()
    {
        return $this->model->active()->withCount(['posts' => function($query) { return $query->visible(); }])->get();
    }

    /**
     * Find category by slug or fail.
     * 
     * @param string $slug Category slug.
     * 
     * @return
     */
    public function findBySlugOrFail($slug)
    {
        return $this->model->active()->where('slug', $slug)->firstOrFail();
    }
}