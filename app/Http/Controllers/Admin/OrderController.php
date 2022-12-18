<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $orders= DB::table('orders')
            ->join('users as u1', 'orders.Client_id', '=', 'u1.id')
            ->join('users as u2', 'orders.Service-provider_id', '=', 'u2.id')
            ->select('orders.order_id','orders.description','u1.first_name as Client_name','u2.first_name as Sp_name')
            ->get();
        return view('admin.orders.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.request');
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $orders= DB::table('orders')
            ->join('users as u1', 'orders.Client_id', '=', 'u1.id')
            ->join('users as u2', 'orders.Service-provider_id', '=', 'u2.id')
            ->select('orders.order_id','orders.description','u1.first_name as Client_name','u2.first_name as Sp_name',
                'u1.email as email1','u2.email as email2', 'u1.mob_no as mob1','u2.mob_no as mob2')
            ->where('orders.order_id',$order['order_id'])
            ->first();
//dd($orders);
        return view('admin.orders.show',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $orders)
    {
        $orders->delete();
        return redirect()->route('admin.orders.index')
            ->with('success','order deleted successfully');
    }

}
