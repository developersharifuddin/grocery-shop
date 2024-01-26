<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseOrders extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'total_purchase_qty',
        'total_received_qty',
        'total_purchase_amount',
        'is_purchased',
        'is_received',
        'is_closed',
        'purchased_by',
    ];

    public function purchaseOrderChildren()
    {
        return $this->hasMany(PurchaseOrdersChild::class, 'po_id');
    }

    public function supplier()
    {
        return $this->hasMany(Supplier::class, 'name');
    }
}
