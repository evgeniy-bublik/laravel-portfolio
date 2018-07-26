<?php

namespace App\Models\Portfolio;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Work extends Model
{
    protected $table = 'portfolio_works';

    const FILE_PATH = 'storage/portfolio';

    /**
     * Scope for get portfolio works by active field.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    public function getImageUrlAttribute()
    {
        return self::FILE_PATH . '/' . $this->attributes[ 'image' ];
    }

    /**
     * Get portfolio work meta title with replaced placeholders.
     *
     * @return string
     */
    public function getMetaTitleAttribute()
    {
        return strtr($this->attributes[ 'meta_title' ], [
            '{workName}' => $this->name,
            '{siteName}' => env('SITE_NAME', ''),
        ]);
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

    public function category()
    {
        return $this->belongsTo('App\Models\Portfolio\Category', 'category_id');
    }
}
