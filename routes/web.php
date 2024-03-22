<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;


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

Route::view('/', 'ventas.index');

Route::view('dashboard', 'ventas.index')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
Route::get('/getProducto',[ProductoController::class,'getProducto'])->middleware(['auth']);
Route::post('/setProducto',[ProductoController::class,'setProducto'])->middleware(['auth']);
Route::get('/getCliente',[ClienteController::class,'getCliente'])->middleware(['auth']);
Route::post('/setCliente',[ClienteController::class,'setCliente'])->middleware(['auth']);
Route::get('/getVendedor',[VendedorController::class,'getVendedor'])->middleware(['auth']);
Route::post('/setVendedor',[VendedorController::class,'setVendedor'])->middleware(['auth']);
Route::get('/getCategoria',[CategoriaController::class,'getCategoria'])->middleware(['auth']);
Route::post('/setCategoria',[CategoriaController::class,'setCategoria'])->middleware(['auth']);
Route::get('/estadisticas',[VendedorController::class,'estadisticas'])->middleware(['auth']);





Route::resource('categorias',CategoriaController::class)->middleware(['auth']);
Route::resource('productos',ProductoController::class)->middleware(['auth']);
Route::resource('ventas',VentaController::class)->middleware(['auth']);
Route::resource('ordenes',OrdenController::class)->middleware(['auth']);
Route::resource('vendedores',VendedorController::class)->middleware(['auth']);
Route::resource('clientes',ClienteController::class)->middleware(['auth']);



require __DIR__.'/auth.php';
