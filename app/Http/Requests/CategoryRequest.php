<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id' => 'required|max:11',
            'title_en' => 'required|min:5|max:255',
            'title_ar' => 'required|min:5|max:255',
            'description_en' => 'required|min:10|max:255',
            'description_ar' => 'required|min:10|max:255',
            'parent_id' => 'required|max:255',
            'cate_image' => 'required|image|mimes:png,jpeg,jpg,gif|max:2048',
        ];
    }
}
