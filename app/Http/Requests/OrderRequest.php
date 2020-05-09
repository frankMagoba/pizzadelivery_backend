<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address' => 'required',
            'phone_number' => 'required',
            'name' => 'required',
            'items' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'address.required' => 'An address is required',
            'phone_number.required'  => 'A phone number is required',
            'name.required'  => 'A name is required',
            'items.required'  => 'One or more items are required to proceed',
        ];
    }
}
