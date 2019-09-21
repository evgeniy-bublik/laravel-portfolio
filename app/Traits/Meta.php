<?php

namespace App\Traits;

use App\DTOs\Core\MetaDTO;
use App\Models\SiteCorePage;

trait Meta
{
    /**
     * Get meta dto from page.
     * 
     * @return \App\DTOs\Core\MetaDTO
     */
    public function getEmptyMetaObject()
    {
        return new MetaDTO();
    }

    /**
     * Get meta from page object.
     * 
     * @param \App\Models\SiteCorePage $page Page object.
     * 
     * @return \App\DTOs\Core\MetaDTO
     */
    public function getMetaFromPage(SiteCorePage $page)
    {
        return MetaDTO::createObjectFromPageModel($page);
    }
}