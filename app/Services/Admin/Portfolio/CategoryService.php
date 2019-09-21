<?php

namespace App\Services\Admin\Portfolio;

use App\Http\Requests\Admin\Portfolio\CategoryStoreRequest;

/**
 * Admin portfolio category service class.
 */
class CategoryService
{
    /**
     * Get store data for portfolio category model from request.
     * 
     * @param \App\Http\Requests\Admin\Portfolio\CategoryStoreRequest $request Request object.
     * 
     * @return array
     */
    public function getStoreDataFromRequest(CategoryStoreRequest $request)
    {
        $request->merge(['active' => ($request->active) ? 1 : 0]);

        return $request->only(['name', 'display_order', 'active']);
    }
}
