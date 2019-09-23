<?php

namespace App\Services\Admin\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Admin portfolio category service class.
 */
class CategoryService
{
    /**
     * Get store data for portfolio category model from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request Form request.
     * 
     * @return array
     */
    public function getStoreDataFromRequest(FormRequest $request)
    {
        $request->merge(['active' => ($request->active) ? 1 : 0]);

        return $request->only(['name', 'display_order', 'active']);
    }
}
