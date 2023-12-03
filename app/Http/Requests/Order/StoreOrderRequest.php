<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            'customer_id' => [
                'required',
                'uuid',
                Rule::exists('customers', 'customer_id'),
            ],
            'order_date' => [
                'required',
                'date',
            ],
            'delivery_date' => [
                'required',
                'date',
                'after_or_equal:order_date',
            ],
            'status' => [
                'required',
                'string',
                Rule::in(['pending', 'processing', 'completed']),
            ],
        ];
        
    }
    public function messages(): array
    {
        return [
            'uuid' => 'The :attribute must be a valid UUID.',
            'exists' => 'The selected :attribute is invalid.',
            'after_or_equal' => 'The :attribute must be a date after or equal to the order date.',
            'in' => 'The selected :attribute is invalid.',
        ];
    }

    public function attributes(): array
    {
        return [
            'customer_id' => 'Customer ID',
            'order_date' => 'Order Date',
            'delivery_date' => 'Delivery Date',
            'status' => 'Status',
        ];
    }
}
