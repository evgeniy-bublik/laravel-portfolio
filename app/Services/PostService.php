<?php

namespace App\Services;

use App\Traits\Meta;
use App\DTOs\Core\MetaDTO;
use Illuminate\Foundation\Http\FormRequest;

class PostService
{
    use Meta;

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
     * Get fields for comment from request.
     * 
     * @param Illuminate\Foundation\Http\FormRequest $request From request.
     * 
     * @return array
     */
    public function getFieldsForCommentFromRequest(FormRequest $request)
    {
        return $request->only([
            'user_name',
            'user_email',
            'post_id',
            'text',
        ]);
    }
}
