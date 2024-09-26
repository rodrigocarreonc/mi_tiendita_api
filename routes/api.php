<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendedoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vendedores',[VendedoresController::class, 'index']);
Route::get('/vendedores/top5',[VendedoresController::class, 'top_vendedores']);
Route::get('/vendedores/{id}/',[VendedoresController::class, 'profile']);
Route::get('/vendedores/{id}/productos',[VendedoresController::class, 'products']);

Route::get('/perfil/{id}',[ClientesController::class, 'profile']);
Route::get('/perfil/{id}/historial',[ClientesController::class, 'purchase_history']);