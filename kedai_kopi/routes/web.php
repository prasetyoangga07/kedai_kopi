<?php

use App\Http\Controllers\AprioriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\LandingController;


Route::get('/login', function () {
    return redirect('/login');
});

// =================================
// AUTHENTICATION ROUTES
// =================================

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// =================================
// ADMIN & BARISTA ROUTES
// =================================

Route::middleware(['auth', 'role:admin,barista'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // CUSTOMER 
    Route::prefix('/customers')->name('customers.')->controller(CustomerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{customer}', 'update')->name('update');
        Route::delete('/{customer}', 'destroy')->name('destroy');
    });

    // PRODUCT
    Route::prefix('/products')->name('products.')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{product}', 'update')->name('update');
        Route::delete('/{product}', 'destroy')->name('destroy');
    });

    // CAMPAIGN (Admin only)
    Route::middleware('role:admin')->prefix('/campaigns')->name('campaigns.')->controller(CampaignController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{campaign}', 'update')->name('update');
        Route::delete('/{campaign}', 'destroy')->name('destroy');
    });

    // APRIORI (Admin only)
    Route::middleware('role:admin')->prefix('/apriori')->name('apriori.')->controller(AprioriController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/generate', 'generate')->name('run');
    });
});

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::post('/campaigns', [CampaignController::class, 'store'])
    ->name('campaigns.store');

Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])
    ->name('campaigns.update');

Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])
    ->name('campaigns.destroy');

// CUSTOMER DASHBOARD
Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');

//  LANDING PAGE VISIT
Route::get('/', [LandingController::class, 'index'])
    ->name('landing');

Route::get('/promo', [CampaignController::class, 'landing'])
    ->name('promo.index');

Route::get('/promo/{campaign}', [CampaignController::class, 'showLanding'])
    ->name('promo.show');