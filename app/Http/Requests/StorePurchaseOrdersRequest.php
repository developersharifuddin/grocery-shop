<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseOrdersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // Add authorization logic if needed
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
            'supplier_id' => 'required|integer',
            'total_purchase_qty' => 'required|integer',
            'total_purchase_amount' => 'required|numeric',
            'purchased_by' => 'required|integer',
            'items.*.product_id' => 'required|integer',
            'items.*.purchase_qty' => 'required|integer',
            'items.*.amount' => 'required|numeric',
            'items.*.total_amount' => 'required|numeric',
            'items.*.is_received' => 'required|boolean',
        ];
    }
}
