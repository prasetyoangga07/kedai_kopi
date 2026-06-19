<?php

use App\Http\Controllers\AprioriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\LandingController;

// =================================
// AUTHENTICATION ROUTES
// =================================

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');





Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.index');
});

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

use App\Http\Controllers\CampaignController;

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
Route::middleware('auth')->group(function () {

    Route::get(
        '/customer/dashboard',
        [CustomerDashboardController::class, 'index']
    )->name('customer.dashboard');
});

// Logout (for customer navbar)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');



// render full product catalog for customer


// CUSTOMER PURCHASE & TRANSACTIONS
Route::middleware('auth')->group(function () {
    // Purchase menu
    Route::get('/customer/purchase', [\App\Http\Controllers\CustomerPurchaseController::class, 'index'])
        ->name('customer.purchase');

    Route::get('/customer/transactions', [\App\Http\Controllers\CustomerPurchaseController::class, 'transactions'])
        ->name('customer.transactions');

    // Products for customer
    Route::get('/customer/products', [\App\Http\Controllers\CustomerProductsController::class, 'index'])
        ->name('customer.products');

    Route::get('/customer/products/{product}', [\App\Http\Controllers\CustomerProductsController::class, 'show'])
        ->name('customer.products.show');

    // Cart
    Route::get('/customer/cart', [\App\Http\Controllers\CustomerCartController::class, 'index'])
        ->name('customer.cart');

    Route::post('/customer/cart/add', [\App\Http\Controllers\CustomerCartController::class, 'add'])
        ->name('customer.cart.add');

    Route::post('/customer/cart/update', [\App\Http\Controllers\CustomerCartController::class, 'update'])
        ->name('customer.cart.update');

    Route::post('/customer/cart/remove', [\App\Http\Controllers\CustomerCartController::class, 'remove'])
        ->name('customer.cart.remove');

    // Checkout
    Route::post('/customer/checkout', [\App\Http\Controllers\CustomerCartController::class, 'checkout'])
        ->name('customer.checkout');
});



//  LANDING PAGE VISIT
Route::get('/', [LandingController::class, 'index'])
    ->name('landing');


Route::get('/promo', [CampaignController::class, 'landing'])
    ->name('promo.index');

Route::get('/promo/{campaign}', [CampaignController::class, 'showLanding'])
    ->name('promo.show');

Route::get('/menu', [ProductController::class, 'menu'])
    ->name('products.menu');

Route::get('/menu/{product}', [ProductController::class, 'show'])
    ->name('products.show');
