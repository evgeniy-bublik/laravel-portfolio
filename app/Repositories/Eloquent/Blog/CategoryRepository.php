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
}