<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemInfoRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'min_qty' => 'nullable|numeric|min:1',
            'trans_uom' => 'nullable|integer',
            'stock_uom' => 'nullable|integer',
            'sales_uom' => 'nullable|integer',
            'brand' => 'nullable',
            'product_id' => 'nullable|unique:item_infos,id',
            'name' => 'required|string|unique:item_infos,name',
            'name_bangla' => 'nullable',
            'attachment' => 'nullable',
            'published_price' => 'required|numeric',
            'sell_price' => 'nullable|numeric',
            'published' => 'nullable|numeric',
            'purchase_price' => 'required|numeric',
            'discount' => 'nullable',
            'discount_type' => 'nullable|integer',
            'current_stock' => 'nullable',
            'images' => 'nullable',
            'thumbnail' => 'nullable|numeric',
            'status' => 'nullable',
            'stock_status' => 'nullable',
            'sub_title' => 'nullable|string',
            'summary' => 'nullable',
            'meta_name' => 'nullable',
            'meta_description' => 'nullable',
            'meta_image' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keyword' => 'nullable',
        ];
    }
}
