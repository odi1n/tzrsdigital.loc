<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function getCategories()
    {
        $category = Category::paginate(40);
        return view('categories', ['categories' => $category]);
    }
}
