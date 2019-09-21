<?php

namespace App\Services\Admin\Portfolio;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Portfolio\Work;
use Illuminate\Support\Facades\Storage;

/**
 * Admin portfolio work service class.
 */
class WorkService
{
    public function getImageFromRequest(FormRequest $request)
    {
        return $request->file('image');
    }

    /**
     * Get store data for portfolio work model from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request Request object.
     * 
     * @return array
     */
    public function getStoreDataFromRequest(FormRequest $request)
    {
        $request->merge(['active' => ($request->active) ? 1 : 0]);

        return $request->only([
            'category_id',
            'name',
            'slug',
            'description',
            'url',
            'date',
            'technologies',
            'active',
            'meta_title',
            'meta_keywords',
            'meta_description',
        ]);
    }

    /**
     * Save portfolio work image.
     * 
     * @param App\Models\Portfolio\Work $work Portfolio work model.
     * @param
     * 
     * @return void
     */
    public function saveImage(Work $work, $image)
    {
        $imageName = uniqid() . '.' . $image->clientExtension();

        Storage::disk('local')->put('public/' . Work::getFilePath($work->id) . '/' . $imageName, file_get_contents($image->getRealPath()));
    }

    /**
     * Delete portfolio work image dir.
     * 
     * @param int $workId work id.
     * 
     * @return void
     */
    public function deleteImageDir($workId)
    {
        Storage::disk('local')->deleteDirectory('public/' . Work::getFilePath($workId));
    }
}
