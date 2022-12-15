<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CadastroController;

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

Route::get('/', [ProductsController::class, 'index'])->name('index-Create');
Route::get('/Cadastro', [ProductsController::class, 'create'])->name('cadastroCreate');
Route::post('/', [ProductsController::class, 'store'])->name('cadastroStore');
Route::delete('/{id}', [ProductsController::class, 'destroy'])->where('id', '[0-9]+')->name('cadastroDestroy');
Route::get('/{id}/edit', [ProductsController::class, 'edit'])->where('id', '[0-9]+')->name('cadastroEdit');
Route::put('/{id}', [ProductsController::class, 'update'])->where('id', '[0-9]+')->name('cadastroUpdate');
Route::get('/lixeira', [ProductsController::class, 'archive'])->name('cadastroLixeira');
Route::get('/{id}/restore', [ProductsController::class, 'restore'])->name('cadastroRestore');
Route::get('/{id}/erase', [ProductsController::class, 'erase'])->name('cadastroErase');
Route::get('/filter', [ProductsController::class, 'filter'])->name('cadastroFilter');

