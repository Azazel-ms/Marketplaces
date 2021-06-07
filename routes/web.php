<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SourceController;

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

//Route::get('/sourceItems', [SourceController::class, 'itemSources'])->name('Source_items');

Route::group(['prefix' => 'source'], function(){ 

	Route::get(
    	'items',
    	[SourceController::class, 'itemSources']
	)->name('Source_items');	

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/providers', function(){
    return view('providers');
});