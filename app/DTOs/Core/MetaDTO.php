<?php

namespace App\DTOs\Core;

use App\Models\SiteCorePage;

/**
 * Meta class.
 */
class MetaDTO
{
    /**
     * Meta title.
     * 
     * @access private
     * 
     * @var string $title.
     */
    private $title;

    /**
     * Meta keywords.
     * 
     * @access private
     * 
     * @var string $keywords.
     */
    private $keywords;

    /**
     * Meta description.
     * 
     * @access private
     * 
     * @var string $description.
     */
    private $description;

    /**
     * Constructor.
     * 
     * @param string $title       Meta title.
     * @param string $keywords    Meta keywords.
     * @param string $description Meta description.
     * 
     * @return void
     */
    public function __construct($title = '', $keywords = '', $description = '')
    {
        $this->title       = $title;
        $this->keywords    = $keywords;
        $this->description = $description;
    }

    /**
     * Create object from site core page.
     * 
     * @param \App\Models\SiteCorePage
     * 
     * @return self
     */
    public static function createObjectFromPageModel(SiteCorePage $page)
    {
        return new self($page->meta_title, $page->meta_keywords, $page->meta_description);
    }

    /**
     * Get meta title.
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get meta keywords.
     * 
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
   
    /**
     * Get meta description.
     * 
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}