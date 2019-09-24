<?php

namespace App\Services\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class SocialLinkService
{
    /**
     * Get social link store data from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request Request object.
     * 
     * @return array
     */
    public function getStoreFieldsFromRequest(FormRequest $request)
    {
        $request->merge(['active' => ($request->active) ? 1 : 0]);

        return $request->only([
            'link',
            'additional_classes',
            'active',
            'display_order'
        ]);
    }
}
