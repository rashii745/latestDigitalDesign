<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Order_service;
use Illuminate\Http\Request;

class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_services = Order_service::latest()->paginate(10);
        return view('admin.order_services.index',compact('order_services'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_service  $order_service
     * @return \Illuminate\Http\Response
     */
    public function show(Order_service $order_service)
    {
        return view('admin.order_services.show',compact('order_service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderservice  $orderservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderservice $orderservice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_service $orderservice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_service $orderservice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderservice  $orderservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderservice $orderservice)
    {
        //
    }
}
