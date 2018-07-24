<?php

namespace App\Models\Post;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    protected $table = 'post_comments';

    protected $fillable = [
        'user_name',
        'user_email',
        'text',
    ];

    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    public function getHumanDateAttribute()
    {
        return (new DateTime($this->attributes[ 'created_at' ]))->format('M d, Y');
    }
}
