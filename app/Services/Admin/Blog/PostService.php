<?php

namespace App\Services\Admin\Blog;

use App\Models\Blog\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\Eloquent\Blog\TagRepository;

class PostService
{
    /**
     * Get post store fields from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request Form request.
     * 
     * @return array
     */
    public function getStoreDataFromRequest(FormRequest $request)
    {
        $request->merge(['active' => ($request->active) ? 1 : 0]);

        return $request->except(['_token', 'category_id', 'tags', 'image']);    
    }

    /**
     * Get post image from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request Form request.
     * 
     * @return
     */
    public function getImageFromRequest(FormRequest $request)
    {
        return $request->file('image');
    }

    /**
     * Get post categories ids from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request Form request.
     * 
     * @return array
     */
    public function getCategoriesIdsFromRequest(FormRequest $request)
    {
        $categoryIds = $request->input('category_id', []);

        if (is_null($categoryIds)) {
            return [];
        }

        if (!is_array($categoryIds)) {
            return [$categoryIds];
        }

        return $categoryIds;
    }

    /**
     * Get tags ids for post from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest        $request Form request.
     * @param \App\Repositories\Eloquent\Blog\TagRepository $tagRepo Blog tag repository.
     * 
     * @return array
     */
    public function getTagIdsFromRequest(FormRequest $request, TagRepository $tagRepo)
    {
        $tags   = $this->getUniqueTags($request->get('tags', []));
        $tagIds = [];
        $dbTags = $this->getTagsFromDbByName($tags, $tagRepo);

        foreach ($tags as $tagName) {
            if (array_key_exists($tagName, $dbTags)) {
                $tagIds[] = $dbTags[ $tagName ];

                continue;
            }

            $model = $tagRepo->create($this->getTagDataForNewTagByTagName($tagName));

            $tagIds[] = $model->id; 
        }

        return $tagIds;
    }

    /**
     * Get blog tags from database by names.
     * 
     * @access private
     * 
     * @param array                                         $tags    Tag names.
     * @param \App\Repositories\Eloquent\Blog\TagRepository $tagRepo Blog tag repository.
     * 
     * @return array
     */
    private function getTagsFromDbByName($tags, TagRepository $tagRepo)
    {
        $dbTags = $tagRepo->whereNamesInArrayPluckedByNameAndId($tags);

        return $this->arrayChangeKeyCaseUnicode($dbTags);
    }

    /**
     * Get unique tag names in lower case.
     * 
     * @access private
     * 
     * @param array $tags Tag names.
     * 
     * @return array
     */
    private function getUniqueTags($tags)
    {
        $tags =  array_unique(array_map(function($value) {
            return mb_strtolower($value, 'UTF-8');
        }, $tags));

        return $tags;
    }

    /**
     * Change array keys to lower case.
     * 
     * @access private
     * 
     * @param array $arr Array.
     * @param bool  $c   Type case
     * 
     * @return array
     */
    private function arrayChangeKeyCaseUnicode($arr, $c = CASE_LOWER)
    {
        $c = ($c == CASE_LOWER) ? MB_CASE_LOWER : MB_CASE_UPPER;

        $ret = [];

        foreach ($arr as $k => $v) {
            $ret[mb_convert_case($k, $c, "UTF-8")] = $v;
        }

        return $ret;
    }

    /**
     * Get tag store data by tag name.
     * 
     * @access private
     * 
     * @param string $name Tag name.
     * 
     * @return array
     */
    private function getTagDataForNewTagByTagName($name)
    {
        return [
            'name'       => $name,
            'meta_title' => $name,
            'active'     => 1,
            'slug'       => md5(time()),
        ];
    }

    /**
     * Delete post image dir.
     * 
     * @param int $postId Post id.
     * 
     * @return void
     */
    public function deleteImageDir($postId)
    {
        Storage::deleteDirectory('public/' . Post::getFilePath($postId));
    }

    /**
     * Save post image.
     * 
     * @access private
     * 
     * @param App\Models\Blog\Post $post Post model.
     * @param
     * 
     * @return void
     */
    public function saveImage($postId, $image)
    {
        $imageName = uniqid() . '.' . $image->clientExtension();

        Storage::disk('local')->put('public/' . Post::getFilePath($postId) . $imageName, file_get_contents($image->getRealPath()));
    }
}
