<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Products;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Route::get('/', function () {
//     return view('home.home');
// });

// Route::get('login', function () {
//     return view('home.login');
// });

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout']);

// Route::get('register', function () {
//     return view('home.register');
// });

Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('outofstocks', function () {
    $outOfStock = Products::where('stock', '=', 0)->simplePaginate(8);
    
    return view('dashboard.outofstocks', compact('outOfStock'));
})->middleware('auth');


// Route::get('dashboard', function () {
//     return view('dashboard.dashboard');
// });

// Route::get('categories', function () {
//     return view('dashboard.categories');
// });

// Route::get('categories-add', function () {
//     return view('dashboard.categories-add');
// });

// Route::get('categories-edit', function () {
//     return view('dashboard.categories-edit');
// });

// Route::get('products', function () {
//     return view('dashboard.products');
// });

// Route::get('products-add', function () {
//     return view('dashboard.products-add');
// });

// Route::get('products-detail', function () {
//     return view('dashboard.products-detail');
// });

// Route::get('products-edit', function () {
//     return view('dashboard.products-edit');
// });



Route::get('categories', [CategoriesController::class, 'data'])->middleware('auth');

Route::get('categories/add', [CategoriesController::class, 'add'])->middleware('auth');
Route::post('categories', [CategoriesController::class, 'addData']);

Route::get('categories/edit/{id}', [CategoriesController::class, 'edit'])->middleware('auth');
Route::patch('categories/{id}', [CategoriesController::class, 'editData']);

Route::get('categories/restore', [CategoriesController::class, 'restore'])->middleware('auth');
Route::delete('categories/{id}', [CategoriesController::class, 'delete']);

Route::get('categories/recycle/{id?}', [CategoriesController::class, 'recycle'])->middleware('auth');
Route::get('categories/deletePermanent/{id?}', [CategoriesController::class, 'deletePermanent'])->middleware('auth');

Route::get('products/restore', [ProductsController::class, 'restore'])->middleware('auth');

Route::get('products/recycle/{id?}', [ProductsController::class, 'recycle'])->middleware('auth');
Route::get('products/deletePermanent/{id?}', [ProductsController::class, 'deletePermanent'])->middleware('auth');

Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('products', ProductsController::class)->middleware('auth');
Route::resource('/', HomeController::class);

Route::get('/search', [HomeController::class, 'search'])->name('search');

