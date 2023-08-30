<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_ar'=>'required',
            'name_en'=>'required',
            'slug'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'meta_title_ar'=>'required',
            'meta_title_en'=>'required',
            'meta_description_ar'=>'required',
            'meta_description_en'=>'required',
            'meta_keywords'=>'required'
        ];
    }
}
