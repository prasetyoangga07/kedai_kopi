<?php

use App\Http\Controllers\AprioriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::view('/login', 'auth.login')->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('/customers')->name('customers.')->controller(CustomerController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::put('/{customer}', 'update')->name('update');
    Route::delete('/{customer}', 'destroy')->name('destroy');
});

Route::prefix('/products')->name('products.')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::put('/{product}', 'update')->name('update');
    Route::delete('/{product}', 'destroy')->name('destroy');
});

Route::view('/campaigns', 'campaigns.index');

Route::prefix('/apriori')->name('apriori.')->controller(AprioriController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/generate', 'generate')->name('run');
});

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');