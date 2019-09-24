<?php

namespace App\Services\Admin\Core;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Admin page service class.
 */
class PageService
{
    /**
     * Get page update data from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request Request object.
     * 
     * @return array
     */
    public function getUpdateFieldsFromRequest(FormRequest $request)
    {
        return $request->only([
            'meta_title',
            'meta_keywords',
            'meta_description',
        ]);
    }
}
