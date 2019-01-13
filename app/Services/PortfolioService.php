<?php

namespace App\Services;

use App\Models\Portfolio\Work;
use App\Models\Portfolio\Category;
use Illuminate\Support\Facades\Storage;

/**
 * Portfolio service class.
 */
class PortfolioService
{
    /**
     * Get list categories.
     * 
     * @return
     */
    public function getListCategories()
    {
        return Category::get();
    }

    /**
     * Create portfolio category.
     * 
     * @param array $data Request data for portfolio category.
     * 
     * @return
     */
    public function createPortfolioCategory($data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        return Category::create($data);
    }

    /**
     * Update portfolio category.
     * 
     * @param App\Models\Portfolio\Category $category Portfolio category model.
     * @param array $data Request data for portfolio category.
     * 
     * @return bool
     */
    public function updatePortfolioCategory(Category $category, $data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        return $category->update($data);
    }

    /**
     * Create portfolio work.
     * 
     * @param array $data Request data for portfolio work.
     * @param
     * 
     * @return
     */
    public function createPortfolioWork($data, $image)
    {
        if (!$image) {
            return false;
        }
        
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        $work = Work::create($data);

        if (!$work) {
            return false;
        }

        $this->saveWorkImage($work, $image);

        return true;
    }

    /**
     * Update portfolio work.
     * 
     * @param App\Models\Portfolio\Work $work Portfolio work model.
     * @param array $data Request data for portfolio work.
     * @param
     * 
     * @return bool
     */
    public function updatePortfolioWork(Work $work, $data, $image)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        if (!$work->update($data)) {
            return false;
        }

        if ($image) {
            Storage::delete(Storage::allFiles('public/' . Work::getFilePath($work->id)));

            $this->saveWorkImage($work, $image);
        }

        return true;
    }

    /**
     * Delete portfolio work image dir.
     * 
     * @param int $workId work id.
     * 
     * @return void
     */
    public function deleteWorkImageDir($workId)
    {
        Storage::deleteDirectory('public/' . Work::getFilePath($workId));
    }

    /**
     * Save portfolio work image.
     * 
     * @access private
     * 
     * @param App\Models\Portfolio\Work $work Portfolio work model.
     * @param
     * 
     * @return void
     */
    private function saveWorkImage(Work $work, $image)
    {
        $imageName = uniqid() . '.' . $image->clientExtension();

        Storage::disk('local')->put('public/' . Work::getFilePath($work->id) . $imageName, file_get_contents($image->getRealPath()));
    }
}