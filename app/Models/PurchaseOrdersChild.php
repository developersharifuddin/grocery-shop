<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseOrdersChild extends Model
{
    use HasFactory;
    protected $fillable = [
        'po_id',
        'product_id',
        'purchase_qty',
        'amount',
        'total_amount',
        'is_received',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrders::class, 'po_id');
    }
}
