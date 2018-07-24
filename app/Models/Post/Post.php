<?php

namespace App\Models\Post;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    const LIMIT_RELATED_POSTS = 4;

    const LIMIT_POSTS_ON_PAGE = 15;

    public function scopeVisible(Builder $builder)
    {
        return $builder->where('date', '<=', date('Y-m-d H:i:s'));
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    public function getHumanDateAttribute()
    {
        return (new DateTime($this->attributes[ 'date' ]))->format('M d, Y');
    }

    public function getRelatedPostsAttribute()
    {
        return self::whereHas('tags', function ($query) {
            $tagIds = $this->tags()->pluck('post_tags.id')->all();
            $query->whereIn('post_tags.id', $tagIds);
        })->where('id', '<>', $this->id)->limit(self::LIMIT_RELATED_POSTS)->get();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Post\Tag', 'post_tag', 'post_id', 'post_tag_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Post\Comment');
    }
}
