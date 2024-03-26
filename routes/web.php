<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'showAllSites']);
Route::get('/category/{id}', [SiteController::class, 'showCategorySites']);