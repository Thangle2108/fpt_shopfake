<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'brand_id',
        'short_desc',
        'description',
        'price',
        'sale_price',
        'stock',
        'is_active',
    ];

    // Quan hệ với Brand (nếu có)
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
