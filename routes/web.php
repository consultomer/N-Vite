<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'view'])->name('home');
Route::post('/contactus', [DataController::class, 'query'])->name('query');
Route::get('/category/{id}', [DisplayController::class, 'view'])->name('category');
Route::get('/card/{id}', [DisplayController::class, 'card'])->name('view_card');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('admin', [AdminLoginController::class, 'adminlogin'])->name('admin');
Route::post('logoutadmin', [AdminLoginController::class, 'logoutadmin'])->name('logoutadmin');


Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');
Route::get('/t&c', function () {
    return view('t&c');
})->name('t&c');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/admin', function () {
    return view('auth.adminlogin');
})->name('admin');


Route::middleware(['auths'])->group(function () {
    Route::get('/card/{id}', [DisplayController::class, 'card'])->name('view_card');
    Route::post('/cards', [DisplayController::class, 'capture'])->name('capture');
    Route::post('/list', [DataController::class, 'store'])->name('data.store');
    Route::post('/payment', [DataController::class, 'c_order'])->name('c_order');
    Route::get('/order', [DataController::class, 'order'])->name('order');
   
    Route::get('/card', function () {
        return view('card');
    })->name('card');
    Route::get('/list', function () {
        return view('list');
    })->name('list');
    Route::get('/payment', function () {
        return view('payment');
    })->name('payment');
});


Route::middleware(['is_admin'])->group(function () {
    Route::get('admin.dashboard', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('admin.order', [OrderController::class, 'view'])->name('admin.order');
    Route::get('admin.edit/{id}/edit/{status}', [OrderController::class, 'edit'])->name('admin.edit');
    Route::get('admin.category', [CategoryController::class, 'view'])->name('admin.category');
    Route::post('admin.category', [CategoryController::class, 'add_cat'])->name('add_cat');
    Route::get('admin.category/{category_id}', [CategoryController::class, 'delete_cat'])->name('admin.delcat');
    Route::get('admin.subcategory', [SubCategoryController::class, 'view'])->name('admin.subcategory');
    Route::post('admin.subcategory', [SubCategoryController::class, 'add_subcat'])->name('add_subcat');
    Route::get('admin.delsub/{subcategory_id}', [SubCategoryController::class, 'delete_subcat'])->name('admin.delsub');
    Route::get('admin.item', [ItemController::class, 'view'])->name('admin.item');
    Route::post('admin.item', [ItemController::class, 'add_item'])->name('add_item');
    Route::get('admin.edititem/{item_id}', [ItemController::class, 'view_item'])->name('admin.edititem');
    Route::get('admin.delitem/{item_id}', [ItemController::class, 'delete_item'])->name('admin.delitem');
    Route::put('admin.edititem/{item_id}', [ItemController::class, 'update_item'])->name('update_item');
    Route::get('admin.query', [QueryController::class, 'view'])->name('admin.query');
    Route::get('admin.user', [AdminController::class, 'view'])->name('admin.user');
    Route::post('admin.user', [AdminController::class, 'add'])->name('add_admin');
    Route::get('admin.user/{id}', [AdminController::class, 'delete'])->name('delete_admin');
});
