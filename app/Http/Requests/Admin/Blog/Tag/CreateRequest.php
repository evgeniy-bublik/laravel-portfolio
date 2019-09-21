<?php

namespace App\Http\Requests\Admin\Blog\Tag;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'             => 'required|string|max:255',
            'slug'             => 'required|regex:#^[a-z][a-z\d-]*[a-z\d]$#|max:255|unique:post_tags',
            'display_order'    => 'integer|min:0',
            'meta_title'       => 'string|max:255|nullable',
            'meta_description' => 'string|max:255|nullable',
            'meta_keywords'    => 'string|max:255|nullable',
        ];
    }
}
