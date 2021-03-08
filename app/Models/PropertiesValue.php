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
        return PropertiesValue::where('product_id', '=', $product_id)
            ->get();
    }

    public static function getProduct($idProduct)
    {
        return Product::find($idProduct);
    }

    public static function getProperties($idProperties)
    {
        return Properties::find($idProperties);
    }

    public static function getPropertiesSorting($category_id)
    {
        $properties_values = PropertiesValue::join('products', 'properties_values.product_id', 'products.id')
            ->join('properties', 'properties_values.properties_id', 'properties.id')
            ->select('properties_values.*',
                'products.category_id',
                'properties.name as properties_name',
                'properties.id as properties_id')
            ->where('category_id', '=', $category_id)
            ->get()
            ->unique('value', 'properties_name');

        $arrProperties = array();
        foreach ($properties_values as $properties_value) {
            $name = $properties_value->properties_name;
            $value = $properties_value->value;

            if (!array_key_exists($name, $arrProperties))
                $arrProperties[$name] = [];

            array_push($arrProperties[$name], ['values' => $value, 'properties_id' => $properties_value->id]);
        }
        return $arrProperties;
    }

    use HasFactory;
}
