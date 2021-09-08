<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuggestProductRequest extends FormRequest
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
          'category_id' => 'required',
          'name' => 'required|unique:products',
          'price' => 'required|numeric',
          'amount_of' => 'required|numeric',
          'content' => 'required',
          'images' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'category_id' => __('custom.category'),
            'name'        => __('custom.name_product'),
            'price'       => __('custom.price'),
            'amount_of'   => __('custom.quantity'),
            'content'     => __('custom.content'),
            'images'      => __('custom.images'),
        ];
    }
}
