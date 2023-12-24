<?php

namespace App\Http\Requests\ProductAttribute;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductAttributeRequest extends FormRequest
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
            'product_id' => [
                'required',
                'exists:products,product_id'
            ],

            'type_id' => [
                'required',
                'exists:types,type_id'
            ],

            'attribute_value' => [
                'bail',
                'required',
                'in:EU 30,EU 32,EU 33,EU 34,EU 35.5,EU 36,EU 36.5,EU 37,EU 37.5,EU 38,EU 38.5,EU 39,EU 39.5,EU 40,EU 40.5,EU 41,EU 41.5,EU 42,EU 42.5,EU 43',
            ],
                        
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền.',
        ];
    }

    public function attributes(): array
    {
        return [
            'product_id' => 'Product ID',
            'type_id' => 'Type ID',
            'attribute_value' => 'Value',
        ];
    }
}
