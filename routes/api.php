<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscountController;

Route::prefix('api')->group(function () {
    Route::post('/discounts/apply', [DiscountController::class, 'applyDiscount']);
});