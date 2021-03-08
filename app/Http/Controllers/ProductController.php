<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Characteristics;
use App\Models\PropertiesValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use function Sodium\add;

class ProductController extends Controller
{
    /* Транслитерация
     * https://webstool.ru/translitizacziya-url-v-laravel.html
     */

    public function getAllProduct($category_id)
    {
        $products = Product::where('category_id', $category_id)
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.*', 'categories.name as categories_name');

        $properties_values = PropertiesValue::
        join('products', 'properties_values.product_id', 'products.id')
            ->join('properties', 'properties_values.properties_id', 'properties.id')
            ->select('properties_values.*',
                'products.category_id',
                'properties.name as properties_name')
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

//        dd($products);

        return view('product', ['products' => $products->paginate(40),
            'properties_values' => $arrProperties,
        ]);
    }

    public function getCharacteristics($category, $product_id)
    {
        $product = Product::find($product_id);
        $propertiesValues = Product::getPropertiesValue($product_id);

//        if ($product == null) {
//            return redirect(route('user.index'));
//        }

//        return dump($propertiesValues);
        return view('characteristics', ['product' => $product,
            'properties_values' => $propertiesValues]);
    }
}
