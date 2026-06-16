<?php

use App\Http\Controllers\AprioriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
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

use App\Http\Controllers\CampaignController;

Route::get('/campaigns', [CampaignController::class,'index'])
    ->name('campaigns.index');

Route::get('/apriori', [AprioriController::class, 'index'])->name('apriori.index');

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::post('/campaigns', [CampaignController::class, 'store'])
    ->name('campaigns.store');

Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])
    ->name('campaigns.update');

Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])
    ->name('campaigns.destroy');
