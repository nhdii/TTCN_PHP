<?php

namespace App\Http\Product\Requests;

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
            'description' => [
                'required',
                'string',
            ],
            'default_price' => [
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
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048', // 2MB
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
                'string',
                'max:20',
            ],
            'size' => [
                'required',
                'string',
                'max:10',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'uuid' => 'The :attribute must be a valid UUID.',
            'exists' => 'The selected :attribute is invalid.',
            'image' => 'The :attribute must be an image (jpeg, png, jpg, gif) with a maximum size of 2MB.',
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
