<?php

//use App\Http\Controllers;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\SubDomainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderServiceController;
use App\Http\Controllers\OfferServiceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceProviderController;
use App\Http\Controllers\Admin\PagesController;


Route::resource('serviceproviders', ServiceproviderController::class);
Route::resource('clients', ClientController::class);
Route::resource('domains', DomainController::class);
Route::resource('subdomains', SubDomainController::class);
Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class);
Route::resource('order_services', OrderserviceController::class);
Route::resource('offer_services', OfferServiceController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('requests', UserRequestController::class);


//, 'as' => 'admin-','prefix' => 'admin'

Route::group(['namespace' => 'Admin'], function () {

    Route::get('/404',[PagesController::class,'page']);
    Route::get('/blank',[PagesController::class,'blank']);
    Route::get('/domain',[PagesController::class,'domain']);
    Route::get('/chart',[PagesController::class,'chart']);
    Route::get('/element',[PagesController::class,'element']);
    Route::get('/form',[PagesController::class,'form']);
    Route::get('/index',[PagesController::class,'index']);
    Route::get('/signin',[PagesController::class,'signin']);
    Route::get('/signup',[PagesController::class,'signup']);
    Route::get('/table',[PagesController::class,'table']);
    Route::get('/typography',[PagesController::class,'typography']);
    Route::get('/widget',[PagesController::class,'widget']);

});
