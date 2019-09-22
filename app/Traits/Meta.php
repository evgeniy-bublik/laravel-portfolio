<?php

namespace App\Traits;

use App\DTOs\Core\MetaDTO;
use App\Models\SiteCorePage;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Get meta dto from model.
     * 
     * @param Illuminate\Database\Eloquent\Model $model Model object.
     * 
     * @return \App\DTOs\Core\MetaDTO
     */
    public function getMetaDtoFromModel(Model $model)
    {
        return new MetaDTO($model->meta_title, $model->meta_keywords, $model->meta_description);
    }
}