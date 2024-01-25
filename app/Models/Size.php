<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['id', 'name_en', 'name_bn', 'size', 'description', 'logo', 'status', 'created_at', 'updated_at'];
    protected string $id;
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->setTimezone("Asia/Dhaka");
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->setTimezone("Asia/Dhaka");
    }


    public function scopeFilter($query, $request)
    {
        $query->when($request->search ?? false, function ($query, $search) {
            $query->where('name_en', 'like', "%$search%")
                ->orWhere('name_bn', 'like', "%$search%");
        });

        return $query;
    }
}
