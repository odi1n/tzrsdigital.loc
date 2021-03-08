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

    public static function getByProductCategory($category_id)
    {
        return Product::where('category_id', $category_id)
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.*', 'categories.name as categories_name');
    }

    use HasFactory;
}
