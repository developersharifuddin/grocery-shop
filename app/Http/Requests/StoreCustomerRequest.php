<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'slug' => 'nullable',
            'phone' => 'required|string',
            'email' => 'required|email',
            'gst_number' => 'numeric',
            'tax_number' => 'numeric',
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'address' => 'required|string',
            'previous_due' => 'numeric',
        ];
    }
}
