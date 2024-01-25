<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'name_english', 'name_bangla', 'description', 'status', 'color', 'code'];
    protected $fillable = ['id', 'name_english', 'name_bangla', 'description', 'status', 'color', 'code'];


    public function scopeFilter($query, $request)
    {
        $query->when($request->search ?? false, function ($query, $search) {
            $query->where('name_english', 'like', "%$search%")
                ->orWhere('name_bangla', 'like', "%$search%");
        });

        return $query;
    }
}
