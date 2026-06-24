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
use App\Http\Controllers\LoyaltyLevelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

// ADMIN PANEL 
Route::middleware(['auth', 'permission:admin.panel'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')
        ->middleware('permission:dashboard.view');

    // CUSTOMER 
    Route::prefix('/customers')->name('customers.')->controller(CustomerController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:customer.view');
        Route::put('/{customer}', 'update')->name('update')->middleware('permission:customer.update');
        Route::delete('/{customer}', 'destroy')->name('destroy')->middleware('permission:customer.delete');
    });

    // PRODUCT
    Route::prefix('/products')->name('products.')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:product.view');
        Route::post('/', 'store')->name('store')->middleware('permission:product.create');
        Route::put('/{product}', 'update')->name('update')->middleware('permission:product.update');
        Route::delete('/{product}', 'destroy')->name('destroy')->middleware('permission:product.delete');
    });

    // CAMPAIGN
    Route::prefix('/campaigns')->name('campaigns.')->controller(CampaignController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:campaign.view');
        Route::post('/', 'store')->name('store')->middleware('permission:campaign.create');
        Route::put('/{campaign}', 'update')->name('update')->middleware('permission:campaign.update');
        Route::delete('/{campaign}', 'destroy')->name('destroy')->middleware('permission:campaign.delete');
    });

    // LOYALTY
    Route::prefix('/loyalty')->name('loyalty.')->controller(LoyaltyLevelController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:campaign.view');
        Route::post('/', 'store')->name('store')->middleware('permission:campaign.create');
        Route::put('/{loyalty}', 'update')->name('update')->middleware('permission:campaign.update');
        Route::delete('/{loyalty}', 'destroy')->name('destroy')->middleware('permission:campaign.delete');
    });

    // APRIORI
    Route::prefix('/apriori')->name('apriori.')->controller(AprioriController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:apriori.view');
        Route::post('/generate', 'generate')->name('run')->middleware('permission:apriori.generate');
    });

    // REPORT
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index')->middleware('permission:report.view');

    Route::middleware(['auth', 'role:super admin'])->group(function () {

        // USER
        Route::prefix('/users')->name('users.')->controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('index')->middleware('permission:user.view');
            Route::post('/', 'store')->name('store')->middleware('permission:user.create');
            Route::put('/{user}', 'update')->name('update')->middleware('permission:user.update');
            Route::delete('/{user}', 'destroy')->name('destroy')->middleware('permission:user.delete');
        });
    
        // ROLES
        Route::prefix('/roles')->name('roles.')->controller(RoleController::class)->group(function () {
            Route::get('/', 'index')->name('index')->middleware('permission:role.view');
            Route::post('/', 'store')->name('store')->middleware('permission:role.create');
            Route::put('/{role}', 'update')->name('update')->middleware('permission:role.update');
            Route::delete('/{role}', 'destroy')->name('destroy')->middleware('permission:role.delete');
        });

    });

    Route::prefix('/transactions')
        ->name('transactions.')
        ->controller(\App\Http\Controllers\TransactionController::class)
        ->group(function () {

            Route::get('/', 'index')
                ->name('index');

            Route::post('/{transaction}/approve', 'approve')
                ->name('approve');
        });

});

// CUSTOMER PORTAL
Route::middleware('auth')->group(function () {

    // Customer Portal
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
        ->name('customer.dashboard');

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