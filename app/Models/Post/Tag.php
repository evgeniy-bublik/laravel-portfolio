<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Model for table `post_tags`.
 */
class Tag extends Model
{
    /**
     * {@inheritdoc}
     *
     * @var string $table
     */
    protected $table = 'post_tags';

    /**
     * Scope for get tags by active field.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    /**
     * Get tag meta title with replaced placeholders.
     *
     * @return string
     */
    public function getMetaTitleAttribute()
    {
        return strtr($this->attributes[ 'meta_title' ], [
            '{tagName}' => $this->name,
            '{siteName}' => env('SITE_NAME', ''),
        ]);
    }

    /**
     * Posts by tag.
     *
     * @return
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post\Post', 'post_tag', 'post_tag_id', 'post_id');
    }
}
