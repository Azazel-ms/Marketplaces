<?php

use App\Http\Controllers\ProvidersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SourceFieldsController;
use App\Http\Controllers\SourceItemController;
use App\Http\Controllers\SourceProviderController;

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
    return view('layouts.base');
});

//Route::get('/sourceItems', [SourceController::class, 'itemSources'])->name('Source_items');

Route::group(['prefix' => 'source','middleware' => 'auth'], function(){ 
	/*Vistas*/
	Route::get('item',[SourceItemController::class, 'index'])->name('source.item.index');	
	Route::get('provider',[SourceProviderController::class, 'index'])->name('source.provider.index');
	Route::get('fields',[SourceFieldsController::class, 'index'])->name('source.fields.index');
	/*Agregar*/
	Route::post('provider/create',[SourceProviderController::class, 'create'])->name('source.provider.create');
	Route::post('item/create',[SourceItemController::class, 'create'])->name('source.item.create');	

	/*Eliminar*/
	Route::get('delete/{id}',[SourceProviderController::class, 'delete'])->name('source.provider.delete');
	
	/*Editar*/
	Route::put('update/{id}',[SourceProviderController::class, 'update'])->name('source.provider.update');

});


Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('sources.home.index');
})->name('home');

