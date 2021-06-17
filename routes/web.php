<?php

use App\Http\Controllers\ProvidersController;
use Illuminate\Support\Facades\Route;
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
	Route::get('item/',[SourceItemController::class, 'view'])->name('source.item');	
	Route::get('item/index',[SourceItemController::class, 'index'])->name('source.item.index');	
	Route::post('item/create',[SourceItemController::class, 'create'])->name('source.item.create');	
	Route::get('provider/index',[SourceProviderController::class, 'index'])->name('source.provider.index');
	Route::post('provider/crete',[SourceProviderController::class, 'create'])->name('source.provider.create');
	Route::put('provider/update/{id}',[SourceProviderController::class, 'update'])->name('source.provider.update');
	Route::get('provider/delete/{id}',[SourceProviderController::class, 'delete'])->name('source.provider.delete');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('layouts.base');
})->name('dashboard');

Route::get('providers', function(){
    return view('providers');
});

