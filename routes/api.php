<?php

use App\Http\Controllers\BillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public Routes Productos
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
//Public Routes Categorías
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
//Public Routes Subcategorías
Route::get('/subcategories', [SubcategoryController::class, 'index']);
Route::get('/subcategories/{id}', [SubcategoryController::class, 'show']);
Route::post('/subcategories', [SubcategoryController::class, 'store']);
Route::put('/subcategories/{id}', [SubcategoryController::class, 'update']);
Route::delete('/subcategories/{id}', [SubcategoryController::class, 'destroy']);
//Public Routes Ventas
Route::get('/sales', [SaleController::class, 'index']);
Route::get('/sales/{id}', [SaleController::class, 'show']);
Route::post('/sales', [SaleController::class, 'store']);
Route::put('/sales/{id}', [SaleController::class, 'update']);
Route::delete('/sales/{id}', [SaleController::class, 'destroy']);
//Public Routes Usuarios
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
//Public Routes Boletas
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::put('/tickets/{id}', [TicketController::class, 'update']);
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);
//Public Routes Facturas
Route::get('/bills', [BillController::class, 'index']);
Route::get('/bills/{id}', [BillController::class, 'show']);
Route::post('/bills', [BillController::class, 'store']);
Route::put('/bills/{id}', [BillController::class, 'update']);
Route::delete('/bills/{id}', [BillController::class, 'destroy']);