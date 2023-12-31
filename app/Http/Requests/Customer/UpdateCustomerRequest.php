<?php

namespace App\Http\Requests\Customer;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
            'fullName' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\p{L}\s]+$/u'
            ],
            'phone' => [
                'bail',
                'required',
                'string',
                'min:10',
                'max:20',
                'regex:/^[0-9]+$/',
            ],
            'address' => [
                'bail',
                'required',
                'string',
                'min:10',
                'regex:/^[\p{L}0-9\s\-\.\,]+$/u'
            ],
            'birthDay' => [
                'bail',
                'date_format:d/m/Y',
            ],
            'gender' => [
                'bail',
                'required',
                'in:Male,Female,None',
            ],
            'email' => [
                'bail',
                'required',
                'string',
                'email',
                Rule::unique(Customer::class)->ignore($this->customer),
            ],
            'avatar' => [
                'bail',
                'file',
                'mimes:jpg,png',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required.',
            'min' => 'The :attribute must be at least :min characters.',
            'max' => 'The :attribute may not be greater than :max characters.',
            'email' => 'The :attribute must be a valid email address.',
            'unique' => 'The :attribute has already been taken.',
            'date_format' => 'The :attribute does not match the format Y-m-d.',
            'gender.in' => 'The :attribute must be one of Male, Female, or None.',
            'regex' => 'The :attribute contains invalid characters.',
            'address.regex' => 'The :attribute contains invalid characters.',
            'phone.regex' => 'The :attribute must not contain alphabetic characters.',
            'password.regex' => 'The :attribute must contain both letters and numbers.',
            'fullName.regex' => 'The :attribute must not contain numbers.',
            'mimes' => 'The :attribute must be a file of type: jpg, png.',
            'file' => 'The :attribute must be a file.',
        ];
    }

    public function attributes(): array
    {
        return [
            'fullName' => 'Full Name',
            'phone' => 'Phone Number',
            'address' => 'Adsress',
            'birthDay' => 'Birth Day',
            'gender' => 'Gender',
            'email' => 'Địa chỉ email',
            'password' => 'Password',
            'avatar' => 'File Image',
        ];
    }
}