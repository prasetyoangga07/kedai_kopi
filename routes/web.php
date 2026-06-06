<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});

Route::view('/login', 'auth.login')->name('login');

Route::view('/dashboard', 'dashboard.index');

Route::view('/customers', 'customers.index');

Route::view('/products', 'products.index');

Route::view('/campaigns', 'campaigns.index');

Route::view('/apriori', 'apriori.index');

Route::view('/reports', 'reports.index');