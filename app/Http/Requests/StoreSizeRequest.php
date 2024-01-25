<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSizeRequest extends FormRequest
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
            'name_en' => 'required|string|unique:sizes,name_en|min:1|max:100',
            'name_bn' => 'nullable|string|min:1|max:100',
            'description' => 'nullable|string|min:1|max:500',
            'status' => 'nullable|numeric',
            'logo' => 'required|string|image|mimes:png,jpg,jpeg,webp|min:1|max:100',
            'size' => 'required|string|unique:sizes,size|min:1|max:100',
        ];
    }
}
