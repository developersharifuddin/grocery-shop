<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $visible = ['name_english', 'description', 'logo', 'status'];

    protected $fillable = [
        'name_english',
        'name_bangla',
        'description',
        'logo',
        'status'
    ];
}
