<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PopulateDataController;
use App\Http\Controllers\PromoterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AmortizationController;
use App\Http\Controllers\EmailNotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WalletController;

// Process Payments
Route::get('/process-payments/{givenDate}', [PaymentController::class, 'processPaymentsBeforeDate']);

// Populate Data
Route::post('/populate-data', [PopulateDataController::class, 'store']);

// Amortizations
Route::post('/amortizations', [AmortizationController::class, 'create']);
Route::get('/amortizations', [AmortizationController::class, 'getAll']);

// Email Notifications
Route::post('/email-notifications', [EmailNotificationController::class, 'create']);
Route::get('/email-notifications', [EmailNotificationController::class, 'getAll']);

// Payments
Route::post('/payments', [PaymentController::class, 'create']);
Route::get('/payments', [PaymentController::class, 'getAll']);

// Projects
Route::post('/projects', [ProjectController::class, 'create']);
Route::get('/projects', [ProjectController::class, 'getAll']);

// Wallets
Route::post('/wallets', [WalletController::class, 'create']);
Route::get('/wallets', [WalletController::class, 'getAll']);

// Get all profiles
Route::get('/profiles', [ProfileController::class, 'index']);

// Create a new profile
Route::post('/profiles', [ProfileController::class, 'store']);

// Get all promoters
Route::get('/promoters', [PromoterController::class, 'index']);

// Create a new promoter
Route::post('/promoters', [PromoterController::class, 'store']);