<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/invoice', [InvoiceController::class, 'index']);
Route::post('/invoice', [InvoiceController::class, 'store']);
Route::get('/invoice/{invoice}', [InvoiceController::class, 'show']);
Route::put('/invoice/{invoice}', [InvoiceController::class, 'update']);
Route::delete('/invoice/{invoice}', [InvoiceController::class, 'destroy']);
