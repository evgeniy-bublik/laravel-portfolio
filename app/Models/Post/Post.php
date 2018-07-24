<?php

namespace App\Models\Post;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Model for table `posts`.
 */
class Post extends Model
{
    /**
     * Number for show count related posts.
     *
     * @var int
     */
    const LIMIT_RELATED_POSTS = 4;

    /**
     * Number for show count posts for page.
     *
     * @var int
     */
    const LIMIT_POSTS_ON_PAGE = 15;

    /**
     * Scope for get visible posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisible(Builder $builder)
    {
        return $builder->visibleByDate()
            ->active();
    }

    /**
     * Scope for get posts by active field.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    /**
     * Scope for get visible posts by date.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisibleByDate(Builder $builder)
    {
        return $builder->where('date', '<=', date('Y-m-d H:i:s'));
    }

    /**
     * Scope for get latest visible posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestPosts(Builder $builder, $limit = 2)
    {
        return $builder->visible()
            ->withCount(['comments' => function($query) { return $query->active(); }])
            ->orderBy('date', 'desc')
            ->limit($limit);
    }


    /**
     * Get hunam format post date.
     *
     * @return string
     */
    public function getHumanDateAttribute()
    {
        return (new DateTime($this->attributes[ 'date' ]))->format('M d, Y');
    }

    /**
     * Get related posts attribute.
     *
     * @return App\Models\Post\Post[]
     */
    public function getRelatedPostsAttribute()
    {
        return self::whereHas('tags', function ($query) {
            $tagIds = $this->tags()->pluck('post_tags.id')->all();
            $query->whereIn('post_tags.id', $tagIds);
        })->where('id', '<>', $this->id)->limit(self::LIMIT_RELATED_POSTS)->get();
    }

    /**
     * Post tags.
     *
     * @return
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Post\Tag', 'post_tag', 'post_id', 'post_tag_id');
    }

    /**
     * Post comments.
     *
     * @return
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Post\Comment');
    }
}
