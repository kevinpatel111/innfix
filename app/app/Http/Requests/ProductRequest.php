<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_name' => 'required',
            'category_size' => 'required',
            'category_finish' => 'required',
            'product_name' => 'required',
            'image' => 'required',
            'random' => 'required',
            'multiimg' => 'required',
        ];
    }
}
