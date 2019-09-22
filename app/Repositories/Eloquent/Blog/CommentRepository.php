<?php

namespace App\Repositories\Eloquent\Blog;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Blog\Comment;

class CommentRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return string
     */
    public function getModelClass()
    {
        return Comment::class;
    }
}