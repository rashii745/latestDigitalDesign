<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Feedback;
use App\Models\Message;
use App\Models\Order;
use App\Models\ServiceProvider;
use App\Models\Subdomain;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use DB;
//use Auth;

class PageController extends Controller
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


    public function index1()
    {
        $counts = array();

        if(Auth::user()->role=='Admin'){
            $counts['UserRequest'] = UserRequest::count();
            $counts['Domains'] = Domain::count();
            $counts['SubDomains'] = Subdomain::count();
            $counts['Orders'] = Order::count();
            $totalOrders = Order::select(
                DB::raw("(COUNT(*)) as count"),
                DB::raw("MONTHNAME(created_at) as month_name")
            )
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name')
                ->get()
                ->toArray();

            $counts['sp_total_orders'] = $totalOrders;
            $counts['Requests'] = UserRequest::count();
            $totalRequests = UserRequest::select(
                DB::raw("(COUNT(*)) as count"),
                DB::raw("MONTHNAME(created_at) as month_name")
            )
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name')
                ->get()
                ->toArray();

            $counts['sp_total_requests'] = $totalRequests;
            $counts['Clients'] = User::where('role','Client')->count();
            $counts['Service Provider'] = User::where('role','Service-Provider')->count();
            $counts['OrdersTbl'] = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->select('orders.*','users.first_name','users.email','users.mob_no')
                ->get();
        }else {

            $counts['UserRequest'] = UserRequest::where('user_id',Auth::user()->id)->count();
            $counts['Orders'] = Order::where('user_id',Auth::user()->id)->count();

            $totalOrders = Order::select(
                DB::raw("(COUNT(*)) as count"),
                DB::raw("MONTHNAME(created_at) as month_name")
            )
                ->where('user_id', Auth::user()->id)
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name')
                ->get()
                ->toArray();

            $counts['sp_total_orders'] = $totalOrders;
            $counts['Feedbacks'] = Feedback::where('user_id',Auth::user()->id)->count();

            $totalFeedbacks = Feedback::select(
                DB::raw("(COUNT(*)) as count"),
                DB::raw("MONTHNAME(created_at) as month_name")
            )
                ->where('user_id', Auth::user()->id)
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name')
                ->get()
                ->toArray();

         ;   $counts['sp_total_feedbacks'] = $totalFeedbacks;
            $counts['OrdersTbl'] = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->select('orders.*','users.first_name','users.email','users.mob_no')
                ->where('user_id',Auth::user()->id)->get();
        }
        return view('admin.index1',compact('counts'));
    }

    public function getmsg($request_id){

        $data = UserRequest::find($request_id);
        $sp_id = $data['user_id'];

        $message = DB::table('messages')
        ->join('users as u1', 'messages.sender_id', '=', 'u1.id')
        ->join('users as u2', 'messages.receiver_id', '=', 'u2.id')
        ->select('messages.*','u1.first_name as sender_name','u2.first_name as receiver_name')
        ->where('messages.readtext', 0)
        ->where('messages.request_id',$request_id)
        ->where('messages.sender_id',Auth::user()->id)
        ->where('messages.receiver_id',Auth::user()->id)
        ->orWhere('messages.sender_id',$sp_id)
        ->orWhere('messages.receiver_id',$sp_id)
        ->get();

        if($message){
            foreach($message as $mess){
                $mes = Message::find($mess->message_id);
                $mes->readtext = '1';
                $mes->save();
            }
        }

        return json_encode($message);
    }

}

