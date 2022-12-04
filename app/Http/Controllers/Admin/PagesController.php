<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Order;
use App\Models\ServiceProvider;
use App\Models\Subdomain;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;

class PagesController extends \App\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


public function page()
{
    return view('admin.404');
}
public function blank()
{
return view('admin.blank');
}
public function domain()
{
return view('admin.domain');
}
public function chart()
{
    return view('admin.chart');
}
public function element()
{
return view('admin.element');
}
public function form()
{
return view('admin.form');
}
public function index()
{
    $counts = array();
    $counts['UserRequest'] = UserRequest::count();
    $counts['Domains'] = Domain::count();
    $counts['SubDomains'] = Subdomain::count();
    $counts['Orders'] = Order::count();
    $counts['Clients'] = User::where('role','Client')->count();
    $counts['Service Provider'] = User::where('role','Service-Provider')->count();
    $counts['OrdersTbl'] = DB::table('orders')
                        ->join('users', 'users.id', '=', 'orders.user_id')
                        ->select('orders.*','users.first_name','users.email','users.mob_no')
                        ->get();

    return view('admin.index',compact('counts'));
}
public function signin()
{
return view('admin.signin');
}
public function signup()
{
return view('admin.signup');
}
public function table()
{
return view('admin.table');
}
public function typography()
{
return view('admin.typography');
}
public function widget()
{
return view('admin.widget');
}}

