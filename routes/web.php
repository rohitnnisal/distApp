<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AffiliateController;

Route::get('/', [AffiliateController::class, 'index']);
