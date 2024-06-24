<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */
use Illuminate\Support\Facades\Route;

// api.php
Route::get('/invoice', [InvoiceController::class, 'index']);
Route::post('/invoice', [InvoiceController::class, 'store']);
Route::get('/invoice/{invoice}', [InvoiceController::class, 'show']);
Route::put('/invoice/{invoice}', [InvoiceController::class, 'update']);
Route::delete('/invoice/{invoice}', [InvoiceController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
