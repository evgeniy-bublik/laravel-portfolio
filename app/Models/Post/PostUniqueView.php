<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for table `post_unique_views`.
 */
class PostUniqueView extends Model
{
    /**
     * {@inheritdoc}
     *
     * @var array $fillable
     */
    protected $fillable = [
        'post_id',
        'ip',
    ];
}
