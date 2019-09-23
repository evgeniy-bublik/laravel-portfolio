<?php

namespace App\Models\Blog;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

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
     * File path for post preview.
     * 
     * @var string
     */
    const FILE_PATH = 'posts/{id}/preview/';

    /**
     * {@inheritdoc}
     * 
     * @access protected
     * 
     * @var array $fillable.
     */
    protected $fillable = [
        'name',
        'slug',
        'small_description',
        'description',
        'date',
        'active',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    /**
     * Scope for get visible posts.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder Builder object.
     * 
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
     * @param Illuminate\Database\Eloquent\Builder $builder Builder object.
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    /**
     * Scope for get visible posts by date.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder Builder object.
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisibleByDate(Builder $builder)
    {
        return $builder->where('date', '<=', date('Y-m-d H:i:s'));
    }

    /**
     * Scope for get latest visible posts.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder Builder object.
     * 
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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRelatedPostsAttribute()
    {
        return self::whereHas('tags', function ($query) {
            $tagIds = $this->tags()->pluck('post_tags.id')->all();
            $query->whereIn('post_tags.id', $tagIds);
        })->where('id', '<>', $this->id)->limit(self::LIMIT_RELATED_POSTS)->get();
    }

    /**
     * Get category attribute.
     * 
     * @return \App\Models\Blog\Category|null
     */
    public function getCategoryAttribute()
    {
        if (!$this->categories) {
            return null;
        }

        return $this->categories()->first();
    }

    /**
     * Get category id attribute.
     * 
     * @return int|null
     */
    public function getCategoryIdAttribute()
    {
        if (!$this->category) {
            return null;
        }

        return $this->category->id;
    }

    /**
     * Get image url attribute.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        $files = Storage::disk('local')->files('public/'. self::getFilePath($this->id));

        if (isset($files[ 0 ])) {
            return Storage::url($files[ 0 ]);
        }

        return '/images/placeholder.png';
    }

    /**
     * Check if post has image preview.
     * 
     * @return bool
     */
    public function hasImage()
    {
        $files = Storage::disk('local')->files('public/'. self::getFilePath($this->id));

        if (isset($files[ 0 ])) {
            return true;
        }

        return false;
    }

    /**
     * Get post meta title with replaced placeholders.
     *
     * @return string
     */
    public function getMetaTitleAttribute()
    {
        return strtr($this->attributes[ 'meta_title' ], [
            '{postName}' => $this->name,
            '{siteName}' => env('SITE_NAME', ''),
        ]);
    }

    /**
     * Get base meta title attribute.
     * 
     * @return string
     */
    public function getBaseMetaTitleAttribute()
    {
        return $this->attributes[ 'meta_title' ];
    }

    /**
     * Get file path by id.
     * 
     * @param int $id Post id.
     * 
     * @return string
     */
    public static function getFilePath($id)
    {
        return strtr(self::FILE_PATH, [
            '{id}' => $id,
        ]);
    }

    /**
     * Post tags.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Blog\Tag', 'post_tag', 'post_id', 'post_tag_id');
    }

    /**
     * Post tags.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function postTag()
    {
        return $this->hasMany('App\Models\Blog\PostTag');
    }

    /**
     * Post categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Blog\Category', 'post_category', 'post_id', 'post_category_id');
    }

    /**
     * Post comments.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Blog\Comment');
    }
}
