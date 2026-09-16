<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getBadgeAttribute()
    {
        if ($this->sale_price && $this->sale_price < $this->regular_price) {
            $discount = round((($this->regular_price - $this->sale_price) / $this->regular_price) * 100);
            return "-{$discount}%";
        }

        if ($this->featured) {
            return 'Featured';
        }

        return null;
    }
}

