<?php

namespace App\Services;

use App\Traits\Meta;
use App\DTOs\Core\MetaDTO;
use Illuminate\Foundation\Http\FormRequest;

class PostService
{
    use Meta;

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
