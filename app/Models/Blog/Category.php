<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Model for table `post_categories`.
 */
class Category extends Model
{
    /**
     * {@inheritdoc}
     *
     * @var string $table
     */
    protected $table = 'post_categories';

    /**
     * {@inheritdoc}
     *
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'display_order',
        'active',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    /**
     * Scope for get categories by active field.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    /**
     * Get post category meta title with replaced placeholders.
     *
     * @return string
     */
    public function getMetaTitleAttribute()
    {
        return strtr($this->attributes[ 'meta_title' ], [
            '{categoryName}' => $this->name,
            '{siteName}' => env('SITE_NAME', ''),
        ]);
    }

    public function getBaseMetaTitleAttribute()
    {
        return $this->attributes[ 'meta_title' ];
    }

    /**
     * Posts by category.
     *
     * @return
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Blog\Post', 'post_category', 'post_category_id', 'post_id');
    }
}
