<?php

namespace App\Repositories\Eloquent\Portfolio;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Portfolio\Category;

class CategoryRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return
     */
    public function getModelClass()
    {
        return Category::class;
    }

    /**
     * Get active portfolio categories.
     * 
     * @return \App\Models\Portfolio\Category[]
     */
    public function getActiveItems()
    {
        return $this->model->active()->orderBy('display_order', 'desc')->get();
    }
}