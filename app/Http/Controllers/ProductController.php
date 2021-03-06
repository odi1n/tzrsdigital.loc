<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Characteristics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    /* Транслитерация
     * https://webstool.ru/translitizacziya-url-v-laravel.html
     */

    public function get_all_product($category)
    {
        $products = Product::where('category_id', $category)->paginate(40);
        return view('product', ['products' => $products]);
    }

    public function get_characteristics($category, $product_id)
    {
        $product = Product::find($product_id);
        if ($product == null) {
            return redirect(route('user.index'));
        }
        return view('characteristics', ['product' => $product]);
    }
}
