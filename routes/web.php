<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'categorias',
], function () {
    Route::get('/', [CategoriasController::class, 'index'])
         ->name('categorias.categoria.index');
    Route::get('/create', [CategoriasController::class, 'create'])
         ->name('categorias.categoria.create');
    Route::get('/show/{categoria}',[CategoriasController::class, 'show'])
         ->name('categorias.categoria.show')->where('id', '[0-9]+');
    Route::get('/{categoria}/edit',[CategoriasController::class, 'edit'])
         ->name('categorias.categoria.edit')->where('id', '[0-9]+');
    Route::post('/', [CategoriasController::class, 'store'])
         ->name('categorias.categoria.store');
    Route::put('categoria/{categoria}', [CategoriasController::class, 'update'])
         ->name('categorias.categoria.update')->where('id', '[0-9]+');
    Route::delete('/categoria/{categoria}',[CategoriasController::class, 'destroy'])
         ->name('categorias.categoria.destroy')->where('id', '[0-9]+');
});
