<?php

namespace App\Repositories\Eloquent\Blog;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Blog\Post;

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
}