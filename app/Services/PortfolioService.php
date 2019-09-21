<?php

namespace App\Services;

use App\Traits\Meta;
use App\DTOs\Core\MetaDTO;
use App\Models\Portfolio\Work;

/**
 * Portfolio service class.
 */
class PortfolioService
{
    use Meta;

    /**
     * Get meta dto from portfolio work.
     * 
     * @param \App\Models\Portfolio\Work $work Portfolio work model.
     * 
     * @return \App\DTOs\Core\MetaDTO
     */
    public function getMetaDtoFromWork($work)
    {
        return new MetaDTO($work->meta_title, $work->meta_keywords, $work->meta_description);
    }
}