<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteCorePage extends Model
{
    /**
     * Code for index page.
     *
     * @var string
     */
    const PAGE_INDEX_CODE = 'index';

    /**
     * Code for blogs page.
     *
     * @var string
     */
    const PAGE_BLOG_CODE = 'blog';

    /**
     * Code for contacts page.
     *
     * @var string
     */
    const PAGE_CONTACTS_CODE = 'contacts';

    /**
     * Code for portfolio page.
     *
     * @var string
     */
    const PAGE_PORTFOLIO_CODE = 'portfolio';

    /**
     * Get page meta title with replaced placeholders.
     *
     * @return string
     */
    public function getMetaTitleAttribute()
    {
        return strtr($this->attributes[ 'meta_title' ], [
            '{siteName}' => env('SITE_NAME', ''),
        ]);
    }
}
