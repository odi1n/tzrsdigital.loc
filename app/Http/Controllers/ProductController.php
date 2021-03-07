<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Characteristics;
use App\Models\PropertiesValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    /* Транслитерация
     * https://webstool.ru/translitizacziya-url-v-laravel.html
     */

    public function getAllProduct($category)
    {
        $products = Product::where('category_id', $category)->paginate(40);
        return view('product', ['products' => $products]);
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
