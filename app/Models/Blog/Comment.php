<?php

namespace App\Models\Blog;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Model for table `post_comments`.
 */
class Comment extends Model
{
    /**
     * {@inheritdoc}
     *
     * @var strin $table
     */
    protected $table = 'post_comments';

    /**
     * {@inheritdoc}
     *
     * @var array $fillable
     */
    protected $fillable = [
        'user_name',
        'user_email',
        'text',
        'post_id',
        'active',
    ];

    /**
     * Scope for get comments by active field.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder
     * 
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    /**
     * Get hunam format comment date.
     *
     * @return string
     */
    public function getHumanDateAttribute()
    {
        return (new DateTime($this->attributes[ 'created_at' ]))->format('M d, Y');
    }

    /**
     * Get post name attribute.
     * 
     * @return string|null
     */
    public function getPostNameAttribute()
    {
        if (!$this->post) {
            return null;
        }

        return $this->post->name;
    }

    /**
     * Relation with post.
     * 
     * @return
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Blog\Post');
    }
}
