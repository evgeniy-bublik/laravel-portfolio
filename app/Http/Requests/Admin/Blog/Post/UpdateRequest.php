<?php

namespace App\Http\Requests\Admin\Blog\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'category_id'       => 'nullable|exists:post_categories,id',
            'name'              => 'required|string|max:255',
            'slug'              => 'required|regex:#^[a-z][a-z\d-]*[a-z\d]$#|max:255|unique:posts,slug,' . $this->post->id,
            'small_description' => 'required|string|max:255',
            'description'       => 'required|string',
            'date'              => 'required|date_format:Y-m-d H:i:s',
            'image'             => 'image|nullable',
            'meta_title'        => 'string|max:255|nullable',
            'meta_description'  => 'string|max:255|nullable',
            'meta_keywords'     => 'string|max:255|nullable',
        ];
    }
}
