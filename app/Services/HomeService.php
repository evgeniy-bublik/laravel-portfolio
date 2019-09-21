<?php

namespace App\Services;

use App\Models\SiteCorePage;
use App\DTOs\Core\MetaDTO;
use App\Http\Requests\SupportMessageRequest;

/**
 * Site home service.
 */
class HomeService
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
    public function getMetaFromPage($page)
    {
        return MetaDTO::createObjectFromPageModel($page);
    }

    /**
     * Get support message data from request.
     * 
     * @param \App\Http\Requests\SupportMessageRequest $request Request object.
     * 
     * @return array
     */
    public function getDataForSupportMessageFromRequest(SupportMessageRequest $request)
    {
        $data = $request->only([
            'name',
            'email',
            'site',
            'subject',
            'text',
        ]);

        $data[ 'ip' ]         = $request->ip();
        $data[ 'user_agent' ] = $request->header('User-Agent');

        return $data;
    }
}
