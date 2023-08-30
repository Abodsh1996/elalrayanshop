<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class upateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:App\Models\Category,id',
            'name_ar' => 'required',
            'name_en' => 'required',
            'slug' => 'required',
            'short_description_ar' => 'required',
            'short_description_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'price' => 'required',
            'selling_price' => 'required',
            'image' => 'image',
            'qty' => 'required',
            'tax' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description_ar' => 'required',
            'meta_description_en' => 'required',
        ];
    }
}
