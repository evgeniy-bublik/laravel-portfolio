<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = 'post_tag';

    protected $fillable = [
        'post_tag_id',
        'post_id',
    ];
}
