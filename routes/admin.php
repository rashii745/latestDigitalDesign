<?php

//use App\Http\Controllers;
//use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\SubDomainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderServiceController;
use App\Http\Controllers\Admin\OfferServiceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\ViewFeedbackController;
use App\Http\Controllers\Admin\UserRequestController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceProviderController;
use App\Http\Controllers\Admin\ServiceProviderProfileController;
use App\Http\Controllers\Admin\ViewOrdersController;
use App\Http\Controllers\Admin\ViewUserRequestsController;
;




Route::resource('serviceproviders', ServiceproviderController::class);
Route::resource('clients', ClientController::class);
Route::resource('domains', DomainController::class);
Route::resource('subdomains', SubDomainController::class);
Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class);
Route::resource('order_services', OrderserviceController::class);
Route::resource('offer_services', OfferServiceController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('viewfeedbacks', ViewFeedbackController::class);
Route::resource('requests', UserRequestController::class);
Route::resource('vieworders', ViewOrdersController::class);
Route::resource('viewrequests', ViewUserRequestsController::class);
Route::resource('serviceproviderprofile', ServiceProviderProfileController::class);



Route::post('getmsg/{req_id}',[PageController::class,'getmsg']);

//Route::get('vieworders', ['uses' => 'ViewOrdersController@message', 'as' => 'message']);

//, 'as' => 'admin-','prefix' => 'admin'

Route::group(['namespace' => 'Admin'], function () {

    Route::get('index1',[PageController::class,'index1']);
    Route::get('viewrequests',[PageController::class,'message']);
//    Route::get('chart',[PageController::class,'chart']);
    Route::get('spindex', [ServiceProviderController::class,'spindex']);
    Route::get('viewrequests', [ViewUserRequestsController::class,'index']);
//    Route::get('serviceproviderprofile', [ServiceProviderProfileController::class,'serviceproviderprofile']);

    /*Route::group(['as' => 'domains-', 'prefix' => 'domains'], function () {
        Route::get('list', ['uses' => 'DomainController@index', 'as' => 'list']);
        Route::get('add', ['uses' => 'DomainController@create', 'as' => 'add']);
        Route::post('store', ['uses' => 'DomainController@store', 'as' => 'store']);
        Route::get('edit/{id}', ['uses' => 'DomainController@edit', 'as' => 'edit']);
        Route::patch('update/{id}', ['uses' => 'DomainController@update', 'as' => 'update']);
        Route::get('delete/{id}', ['uses' => 'DomainController@destroy', 'as' => 'delete']);
    });*/
});








