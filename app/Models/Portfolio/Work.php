<?php

namespace App\Models\Portfolio;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class Work extends Model
{
    /**
     * {@inheritdoc}
     *
     * @access protected
     *  
     * @var string $table.
     */
    protected $table = 'portfolio_works';

    /**
     * {@inheritdoc}
     * 
     * @access protected
     * 
     * @var array $fillable.
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'url',
        'description',
        'date',
        'technologies',
        'active',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    /**
     * Path to work images.
     * 
     * @var string
     */
    const FILE_PATH = 'portfolio/works/{id}';

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

    /**
     * Scope for get latest active works.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestWorks(Builder $builder, $limit = 2)
    {
        return $builder->active()
            ->orderBy('date', 'desc')
            ->limit($limit);
    }

    public function hasImage()
    {
        $files = Storage::disk('local')->files('public/'. self::getFilePath($this->id));

        if (isset($files[ 0 ])) {
            return true;
        }

        return false;
    }

    public function getImageUrlAttribute()
    {
        $files = Storage::disk('local')->files('public/'. self::getFilePath($this->id));

        if (isset($files[ 0 ])) {
            return Storage::url($files[ 0 ]);
        }

        return '/images/placeholder.png';
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

    public static function getFilePath($id)
    {
        return strtr(self::FILE_PATH, [
            '{id}' => $id,
        ]);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Portfolio\Category', 'category_id');
    }
}
