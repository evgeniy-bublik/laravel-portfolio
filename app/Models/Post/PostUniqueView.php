<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class PostUniqueView extends Model
{
    protected $fillable = [
        'post_id',
        'ip',
    ];
}
