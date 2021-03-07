<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesValue extends Model
{
    public static function get($id)
    {
        return PropertiesValue::find($id);
    }

    public static function getByProductId($product_id)
    {
        return PropertiesValue::where('product_id','=', $product_id)->get();
    }

    public static function getProduct($idProduct)
    {
        return Product::find($idProduct);
    }

    public static function getProperties($idProperties)
    {
        return Properties::find($idProperties);
    }

    use HasFactory;
}
