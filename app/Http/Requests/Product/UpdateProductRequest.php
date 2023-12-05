<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => [
                'required',
                'string',
                'max:255',
            ],
            'desciption' => [
                'required',
                'string',
            ],
            'default_price' => [
                'bail',
                'required',
                'numeric',
                'min:0',
            ],
            'default_stock_quantity' => [
                'bail',
                'required',
                'integer',
                'min:0',
            ],
            'image' => [
                'bail',
                'nullable',
                'image',
                // 'mimes:png,jpg',
            ],
            'brand_id' => [
                'bail',
                'required',
                'uuid',
                Rule::exists('brands', 'brand_id'),
            ],
            'category_id' => [
                'bail',
                'required',
                'uuid',
                Rule::exists('categories', 'category_id'),
            ],
            'gender' => [
                'required',
                'in:Men,Women,Kid',
            ],
            'size' => [
                'bail',
                'required',
                'in:EU 35.5,EU 36,EU 36.5,EU 37,EU 37.5,EU 38,EU 38.5,EU 39,EU 39.5,EU 40,EU 40.5,EU 41,EU 41.5,EU 42,EU 42.5,EU 43',          
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'uuid' => 'The :attribute must be a valid UUID.',
            'min' => 'The :attribute must be at least :min characters.',
            'max' => 'The :attribute may not be greater than :max characters.',
            'exists' => 'The selected :attribute is invalid.',
            'gender.in' => 'The :attribute must be one of Men, Women, or Kid.',
            'mimes' => 'The :attribute must be an image png, jpg',
            'image' => 'The :attribute must be an image png, jpg',
        ];
    }

    public function attributes(): array
    {
        return [
            'product_name' => 'Product Name',
            'description' => 'Description',
            'default_price' => 'Default Price',
            'default_stock_quantity' => 'Default Stock Quantity',
            'image' => 'Image',
            'brand_id' => 'Brand ID',
            'category_id' => 'Category ID',
            'gender' => 'Gender',
            'size' => 'Size',
        ];
    }
}
