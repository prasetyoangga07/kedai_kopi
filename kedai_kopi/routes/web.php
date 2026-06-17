<?php

use App\Http\Controllers\AprioriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Product;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CustomerDashboardController;


Route::get('/', function () {
    return redirect('/login');
});

// LOGIN 

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// DASHBOARD 
Route::middleware('auth')->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard.index');
});

// CUSTOMER 
Route::prefix('/customers')->name('customers.')->controller(CustomerController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::put('/{customer}', 'update')->name('update');
    Route::delete('/{customer}', 'destroy')->name('destroy');
});


// Product 
Route::prefix('/products')->name('products.')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::put('/{product}', 'update')->name('update');
    Route::delete('/{product}', 'destroy')->name('destroy');
});




// CAMPAGN 
Route::get('/campaigns', [CampaignController::class, 'index'])
    ->name('campaigns.index');

Route::prefix('/apriori')->name('apriori.')->controller(AprioriController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/generate', 'generate')->name('run');
});

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::post('/campaigns', [CampaignController::class, 'store'])
    ->name('campaigns.store');

Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])
    ->name('campaigns.update');

Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])
    ->name('campaigns.destroy');



// CUSTOMER DASHBOARD
Route::get(
    '/customer/dashboard',
    [CustomerDashboardController::class, 'index']
)->name('customer.dashboard');    