<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\Admin\ShowProducts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class);

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    
    Route::get('/dashboard', ShowProducts::class)->name('dashboard');
    //Route::get('/products/{product}/edit', [ShowProducts::class, 'update'])->name('dashboard.products.edit');
    //Route::get('/dashboard/{id}', [ShowProducts::class, 'destroy'])->name('dashboard.products.destroy');
});
