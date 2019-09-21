<?php

namespace App\Http\Requests\Admin\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class WorkCreateRequest extends FormRequest
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
            'category_id'      => 'required|exists:portfolio_categories,id',
            'name'             => 'required|string|max:255',
            'slug'             => 'required|regex:#^[a-z][a-z\d-]*[a-z\d]$#|max:255|unique:portfolio_works',
            'description'      => 'required|string',
            'url'              => 'required|url|string|max:255',
            'date'             => 'required|date_format:Y-m-d',
            'technologies'     => 'required|string|max:255',
            'meta_title'       => 'string|max:255|nullable',
            'meta_keywords'    => 'string|max:255|nullable',
            'meta_description' => 'string|max:255|nullable',
            'image'            => 'required|image',
        ];
    }
}
