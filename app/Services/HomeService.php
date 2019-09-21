<?php

namespace App\Services;

use App\Models\SiteCorePage;
use App\DTOs\Core\MetaDTO;
use App\Http\Requests\SupportMessageRequest;
use App\Traits\Meta;

/**
 * Site home service.
 */
class HomeService
{
    use Meta;

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
