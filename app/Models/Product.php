<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function getPropertiesValue($product_id)
    {
        return PropertiesValue::all()->where('product_id', $product_id);
    }

    use HasFactory;
}
