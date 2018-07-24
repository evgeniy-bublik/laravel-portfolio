<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    /**
     * {@inheritdoc}
     *
     * @var string $table
     */
    protected $table = 'post_categories';

    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post\Post', 'post_category', 'post_category_id', 'post_id');
    }
}
