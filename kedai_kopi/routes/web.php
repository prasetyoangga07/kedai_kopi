<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::view('/login', 'auth.login')->name('login');

Route::view('/dashboard', 'dashboard.index');

Route::view('/customers', 'customers.index');

Route::prefix('/products')->name('products.')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::put('/{product}', 'update')->name('update');
    Route::delete('/{product}', 'destroy')->name('destroy');
});

Route::view('/campaigns', 'campaigns.index');

Route::view('/apriori', 'apriori.index');

Route::view('/reports', 'reports.index');