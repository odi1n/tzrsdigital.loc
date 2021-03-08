<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::name('user.')->group(function () {
    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(route('user.index'));
        }

        return view('login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect(\route('user.login'));
    })->name('logout');

    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(route('user.index'));
        }

        return view('registration');
    })->name('registration');

    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);

    Route::get('/', [\App\Http\Controllers\CategoriesController::class, 'getCategories'])
        ->middleware('auth')->name('index');

    Route::get('/{category}', [\App\Http\Controllers\ProductController::class, 'getAllProduct'])
        ->middleware('auth')->name('product');

    Route::get('/{category}/filter/', [\App\Http\Controllers\ProductController::class, 'filter'])
        ->middleware('auth')->name('filter');

    Route::get('/{category}/search/', [\App\Http\Controllers\ProductController::class, 'search'])
        ->middleware('auth')->name('search');

    Route::get('/{category}/{product_id}', [\App\Http\Controllers\ProductController::class, 'getCharacteristics'])
        ->middleware('auth')->name('characteristics');

});
