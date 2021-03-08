<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Characteristics;
use App\Models\PropertiesValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use Illuminate\Support\Collection;
use function Sodium\add;

class ProductController extends Controller
{
    /* Транслитерация
     * https://webstool.ru/translitizacziya-url-v-laravel.html
     */

    public function getAllProduct($category_id)
    {
        $products = Product::getByProductCategory($category_id);
        $properties_values = PropertiesValue::getPropertiesSorting($category_id);

        return view('product', ['products' => $products->paginate(40),
            'properties_values' => $properties_values,
        ]);
    }

    public function getCharacteristics($category, $product_id)
    {
        $product = Product::find($product_id);
        $propertiesValues = Product::getPropertiesValue($product_id);

        return view('characteristics', ['product' => $product,
            'properties_values' => $propertiesValues]);
    }

    public function search(Request $request)
    {
        $searchFields = $request->get('q');
        $category_id = $request['category'];

        $properties_values = PropertiesValue::getPropertiesSorting($category_id);

        if ($searchFields == null)
            $products = Product::getByProductCategory($category_id);
        else
            $products = Product::getByProductCategory($category_id)
                ->where('products.name', $searchFields);

        return view('product', ['products' => $products->paginate(40),
            'properties_values' => $properties_values,
        ]);
    }

    public function filter(Request $request)
    {
        $jsonRequest = response()->json($request->all());
        $json = $jsonRequest->original;

        $properties_values = PropertiesValue::getPropertiesSorting($request['category']);
        $products = Product::getByProductCategory($request['category'])
            //            ->get();
        ;

        if (array_key_exists('priceFrom', $json))
            $products = $products->where('price', '>=', (int)$json['priceFrom']);

        if (array_key_exists('priceTo', $json))
            $products = $products->where('price', '<=', (int)$json['priceTo']);

        if (array_key_exists('count', $json))
            $products = $products->where('count', '>=', (int)$json['count']);

        if (array_key_exists('parameter', $json)) {
            foreach ($json['parameter'] as $key => $value) {
                dump($value);
            }
        }

        return view('product', ['products' => $products->paginate(40),
            'properties_values' => $properties_values,
        ]);
    }
}
