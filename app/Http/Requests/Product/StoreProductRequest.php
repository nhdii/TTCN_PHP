<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
                'bail',
                'required',
                'string',
                'max:255',
            ],
            'desciption' => [
                'bail',
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
                'required',
                'integer',
                'min:0',
            ],
            'image' => [
                'bail',
                'required',
                'file',
                // 'mimes:jpg,png',
            ],
            'brand_id' => [
                'required',
                'uuid',
                Rule::exists('brands', 'brand_id'),
            ],
            'category_id' => [
                'required',
                'uuid',
                Rule::exists('categories', 'category_id'),
            ],
            'gender' => [
                'required',
                'in:Men,Women,Kid',
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
            'mimes' => 'The :attribute must be an image png, jpg',
            'gender.in' => 'The :attribute must be one of Men, Women, or Kid.',
            'file' => ':attribute must be one of file.',
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
        ];
    }
}
