<?php

namespace App\Models;

use Log;
use App\Models\Category;
use Milon\Barcode\DNS1D;
use App\Models\SellsItem;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemInfo extends Model
{
    use Filterable;
    protected $guarded = [];

    protected $fillable = [
        'id', 'code', 'name',
        'name_bangla', 'slug', 'category_id', 'min_qty',
        'trans_uom', 'stock_uom', 'sales_uom', 'brand', 'weight', 'published_price', 'sell_price',
        'purchase_price', 'discount',
        'discount_type', 'current_stock',
        'images', 'thumbnail', 'attachment',
        'published', 'status', 'stock_status',
        'sub_title', 'summary', 'request_status',
        'approved', 'meta_name',  'meta_title',
        'meta_description', 'meta_image',
        'meta_keyword'
    ];
    // public static function boot()
    // {
    // parent::boot();

    // static::creating(function ($product) {
    //     $product->generateAndSaveBarcode();
    // });

    // static::updating(function ($product) {
    //     $product->generateAndSaveBarcode();
    // });
    // }



    public function SellsItem()
    {
        return $this->hasMany(SellsItem::class, 'id');
    }

    // Item.php
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // Item.php
    public function sales_uom()
    {
        return $this->belongsTo(Uom::class);
    }

    // public function stock_uom()
    // {
    //     return $this->belongsTo(Uom::class);
    // }


    // public function generateAndSaveBarcode()
    // {
    //     try {
    //         // dd($this->id);
    //         $barcodeValue = $this->id;

    //         // Instantiate an object of DNS1D
    //         $dns1d = new DNS1D();

    //         // Generate barcode
    //         $barcode = $dns1d->getBarcodeHTML($barcodeValue, 'C39');
    //         // $barcode = $dns1d->getBarcodeHTML($barcodeValue, 'PHARMA2T');

    //         // Save barcode in the "code" column
    //         $this->code = $barcode;

    //         // Save the updated model
    //         // $this->save();
    //         return $barcode;
    //     } catch (\Exception $e) {
    //         // Log or handle the exception as needed
    //         Log::error($e->getMessage());
    //     }
    // }
}
