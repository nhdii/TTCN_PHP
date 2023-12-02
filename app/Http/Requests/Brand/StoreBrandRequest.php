<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'brand_name' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:255',
            ],
                        
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền.',
            'min' => ':attribute phải có ít nhất :min ký tự.',
            'max' => ':attribute không được vượt quá :max ký tự.',
        ];
    }

    public function attributes(): array
    {
        return [
            'brand_name' => 'Brand Name',
        ];
    }
}
