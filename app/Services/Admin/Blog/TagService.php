<?php

namespace App\Services\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class TagService
{
    /**
     * Get blog tag store data from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request Request object.
     * 
     * @return array
     */
    public function getStoreDataFromRequest(FormRequest $request)
    {
        $request->merge(['active' => ($request->active) ? 1 : 0]);

        return $request->except(['_token']);
    }
}
