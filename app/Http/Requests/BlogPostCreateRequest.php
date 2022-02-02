<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:5|max:200',
            'slug'          => 'max:200',

            'content_raw'   => 'required|string|max:10000|min:5',
            'category_id'     => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Введите заголовок статьи',
            'content_raw.min' => 'Минимальная длина статьи 5 символов',
        ];
    }
    public function attributes()
    {
        return [
          'title' => 'Заголовок',
        ];
    }
}
