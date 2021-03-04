<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function get_categories()
    {
        $category = Category::all();
        return view('categories', ['categories' => $category]);
    }
}
