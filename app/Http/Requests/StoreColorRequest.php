<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColorRequest extends FormRequest
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
            'id',
            'name_english' => 'required|string|min:1|max:100|unique:colors,name_english',
            'name_bangla' => 'nullable|string|min:1|max:100',
            'description' => 'nullable|string|min:1|max:1000',
            'status' => 'nullable|numeric',
            'color' => 'required|string||min:1|max:100',
            'code' => 'required|string||min:1|max:100|unique:colors,code',
        ];
    }
}
