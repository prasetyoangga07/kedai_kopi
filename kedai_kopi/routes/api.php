<?php

use App\Http\Controllers\AprioriController;
use Illuminate\Support\Facades\Route;

Route::post('/apriori/generate', [AprioriController::class, 'generate'])
    ->name('apriori.run')
    ->middleware('web');