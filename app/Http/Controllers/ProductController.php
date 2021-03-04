<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    //
    public function get_all_product($category)
    {
        $products = Product::where('category_id',$category)->paginate(40);

        if ($products->count() == 0) {
            return redirect(route('user.private'));
        }

        return view('product', ['products' => $products]);
    }

    public function get_properties($category, $product_id)
    {
        $product = Product::find($product_id);
        if ($product == null) {
            return redirect(route('user.private'));
        }
        return view('properties', ['product' => $product]);
    }
}
