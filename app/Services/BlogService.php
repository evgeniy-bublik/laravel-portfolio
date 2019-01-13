<?php

namespace App\Services;

use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use App\Models\Blog\PostTag;
use App\Models\Blog\Post;
use App\Models\Blog\PostCategory;
use App\Models\Blog\Comment;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    /**
     * Get list blog categories.
     * 
     * @return
     */
    public function getCategoriesList()
    {
        return Category::get();
    }

    /**
     * Get list blog tags.
     * 
     * @return
     */
    public function getListTags()
    {
        return Tag::get()->keyBy('name');
    }

    /**
     * Save blog category.
     * 
     * @param array $data Request data for blog category.
     * 
     * @return
     */
    public function saveBlogCategory($data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        return Category::create($data);
    }

    /**
     * Update blog category.
     * 
     * @param App\Models\Blog\Category $category Blog category model.
     * @param array $data Request data for blog category.
     * 
     * @return bool
     */
    public function updateBlogCategory(Category $category, $data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;
        
        return $category->update($data);
    }

    /**
     * Save blog category.
     * 
     * @param array $data Request data for blog tag.
     * 
     * @return
     */
    public function saveBlogTag($data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;
        $data[ 'name' ] = mb_strtolower($data[ 'name' ], 'UTF-8');

        return Tag::create($data);
    }

    /**
     * Update blog tag.
     * 
     * @param App\Models\Blog\Tag $tag Blog tag model.
     * @param array $data Request data for blog tag.
     * 
     * @return
     */
    public function updateBlogTag(Tag $tag, $data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;
        $data[ 'name' ] = mb_strtolower($data[ 'name' ], 'UTF-8');

        $tag->update($data);
    }

    /**
     * Save blog post.
     * 
     * @param array $data Request data for blog post.
     * @param int $categoryIds Blog category ids.
     * @param array $tags Blog tag ids.
     * @param
     * 
     * @return bool
     */
    public function saveBlogPost($data, $categoryIds, $tags, $image)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        $post = Post::create($data);

        if (!$post) {
            return false;
        }

        $this->savePostCategories($post, $categoryIds);
        $this->savePostTags($post, $tags);
        $this->savePostImage($post, $image);

        return true;
    }

    /**
     * Update blog post.
     * 
     * @param App\Models\Blog\Post $post Post model.
     * @param array $data Request data for blog post.
     * @param int $categoryIds Blog category ids.
     * @param array $tags Blog tag ids.
     * @param
     * 
     * @return bool
     */
    public function updateBlogPost(Post $post, $data, $categoryIds, $tags, $image)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        if (!$post->update($data)) {
            return false;
        }

        $this->savePostCategories($post, $categoryIds);
        $this->savePostTags($post, $tags);

        if ($image) {
            Storage::delete(Storage::allFiles('public/' . Post::getFilePath($post->id)));

            $this->savePostImage($post, $image);
        }
    }

    /**
     * Delete post image dir.
     * 
     * @param int $postId Post id.
     * 
     * @return void
     */
    public function deletePostImageDir($postId)
    {
        Storage::deleteDirectory('public/' . Post::getFilePath($post->id));
    }

    /**
     * Update blog comment.
     * 
     * @param App\Models\Blog\Comment $comment Comment model.
     * @param array $data Request data for blog comment.
     * 
     * @return bool
     */
    public function updateBlogComment(Comment $comment, $data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        return $comment->update($data);
    }

    /**
     * Save categories relation with post.
     * 
     * @access private
     * 
     * @param App\Models\Blog\Post $post Post model.
     * @param int $categoryIds Blog category id.
     * 
     * @return void
     */
    private function savePostCategories(Post $post, $categoryIds)
    {
        if (is_array($categoryIds)) {

        } else {
            $blogCategory = $post->category;

            if ($blogCategory) {
                if ($blogCategory->id == $categoryIds) {
                    return;
                }

                $blogCategory->delete();
            }

            PostCategory::create([
                'post_id' => $post->id,
                'post_category_id' => $categoryIds,
            ]);
        }
    }

    /**
     * Save relation post with tags.
     * 
     * @access private
     * 
     * @param App\Models\Blog\Post $post Post model.
     * @param array $tags List tags.
     * 
     * @return void
     */
    private function savePostTags(Post $post, $tags)
    {
        if (empty($tags)) {
            $tags = [];
        }

        $tags = array_unique(array_map(function($value) {
            return mb_strtolower($value, 'UTF-8');
        }, $tags));

        $siteBlogTags = Tag::whereIn('name', $tags)->get()->keyBy('name')->all();
        $postTagIds = $post->postTag->pluck('post_tag_id', 'post_tag_id');

        foreach ($tags as $tagName) {
            if (!isset($siteBlogTags[ $tagName ])) {
                $tag = $this->saveBlogTag([
                    'active' => 1,
                    'name' =>  $tagName,
                    'slug' => md5(time()),
                    'meta_title' => $tagName,
                ]);

                PostTag::create([
                    'post_id' => $post->id,
                    'post_tag_id' => $tag->id,
                ]);

                continue;
            }

            if (isset($postTagIds[ $siteBlogTags[ $tagName ]->id ])) {
                unset($postTagIds[ $siteBlogTags[ $tagName ]->id ]);
            } else {
                PostTag::create([
                    'post_id' => $post->id,
                    'post_tag_id' => $siteBlogTags[ $tagName ]->id,
                ]);
            }
        }

        PostTag::whereIn('post_tag_id', $postTagIds)->where(['post_id' => $post->id])->delete();
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
    private function savePostImage(Post $post, $image)
    {
        $imageName = uniqid() . '.' . $image->clientExtension();

        Storage::disk('local')->put('public/' . Post::getFilePath($post->id) . $imageName, file_get_contents($image->getRealPath()));
    }
}