<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

use App\http\Controllers\PagesController;
Route::get('/',[PagesController::class,'index']);
Route::get('/detail',[PagesController::class,'shopDetail']);
Route::get('/order',[PagesController::class,'orders']);
Route::get('/contact',[PagesController::class,'contact']);
Route::get('/support',[PagesController::class,'supports']);
Route::get('/request',[PagesController::class,'requests']);

Route::get('/products/{id?}',[PagesController::class,'products']);


Route::post('/requestStore',[PagesController::class,'requestStore'])->name('requestStore');
Route::post('/forOrder',[PagesController::class,'forOrder'])->name('forOrder');


Route::get('/dashboard', function ()
{
    return view('welcome');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';


