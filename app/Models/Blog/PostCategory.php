<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';

    protected $fillable = [
        'post_id',
        'post_category_id',
    ];
}
