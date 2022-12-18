<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use Auth;

class ViewOrdersController extends Controller
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
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.status as order_status','orders.order_id','orders.description','orders.status','users.first_name','users.email','users.mob_no')
            ->where('user_id',Auth::user()->id)->get();
        return view('ServiceProvider.vieworders.index',compact('orders'))
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
    public function store(Request $request, $order_id,$sp_id=null)
    {
//dd('test');
//
        $request->validate([
            'content' => 'required',
            /*'sender_id' => 'required',
            'receiver_id' => 'required',
            'request_id' => 'required',*/

        ]);
        $order = Order::find($order_id);
        $message = DB::table('messages')
            ->join('users as u1', 'messages.sender_id', '=', 'u1.id')
            ->join('users as u2', 'messages.receiver_id', '=', 'u2.id')
            ->select('messages.*','u1.first_name as sender_name','u2.first_name as receiver_name')
            ->where('messages.order_id',$order_id)
            ->where('messages.sender_id',Auth::user()->id)
            ->orWhere('messages.receiver_id',Auth::user()->id)
            ->orWhere('messages.sender_id',$sp_id)
            ->orWhere('messages.receiver_id',$sp_id)
            ->get();
        Message::create($request->all());

        return view('ServiceProvider.vieworders.message',compact('message','order_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $order= DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.order_id','orders.description','orders.status','users.first_name','users.email','users.mob_no')
            ->where('user_id',Auth::user()->id)->first();

        return view('ServiceProvider.vieworders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Order $order, $order_id)
    {

        $request->validate([
            'status'=>'required',
            'avatar' => 'required|mimes:pdf,jpeg,jpg,png,gif|max:2048',
        ]);

        // File upload here
        $fileName = '';
        $file = $request->file('avatar');

        if ($file) {

            $destinationPath = public_path('uploads');
            $fileName = "avatar_" . time() . "." . $file->guessExtension();
            $file->move($destinationPath, $fileName);
        }

        $file = Order::find($order_id);
        $file->status = $request['status'];

        $file->file = $fileName;//$request['file'];
//        $file->save();
        $file->update($request->all());

        return redirect()->route('vieworders.show',$order_id)
            ->with('success','Order completed successfully');

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
