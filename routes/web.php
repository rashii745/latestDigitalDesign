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
Route::get('/request/{id?}',[PagesController::class,'requests']);
Route::get('/providers',[PagesController::class,'serviceproviders']);
Route::get('/textcreate/{request_id?}',[PagesController::class,'textcreates']);
Route::get('/viewrequest/{id?}',[PagesController::class,'requesthistory']);
Route::get('/products/{id?}',[PagesController::class,'products']);
Route::get('/editDesign',[PagesController::class,'editDesign']);
Route::get('/getmsg/{req_id}',[PagesController::class,'getmsg']);

Route::post('/requestStore',[PagesController::class,'requestStore'])->name('requestStore');
Route::post('/forOrder',[PagesController::class,'forOrder'])->name('forOrder');
Route::post('/messageStore',[PagesController::class,'messageStore'])->name('messageStore');


Route::get('/dashboard', function ()
{
    return view('welcome');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

require 'admin.php';


