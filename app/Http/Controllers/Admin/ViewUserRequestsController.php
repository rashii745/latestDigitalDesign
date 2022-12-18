<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\RequestModel;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Message;
use DB;
use Auth;
class ViewUserRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserRequests = UserRequest::all();
        $UserRequests= DB::table('requests')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.request_id','requests.description','users.first_name','users.email')
            ->get();
        return view('ServiceProvider.viewrequests.index',compact('UserRequests'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $UserRequest = UserRequest::find($id);
        $UserRequest= DB::table('requests')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.request_id','requests.description','users.first_name','users.email')
            ->first();
        return view('ServiceProvider.viewrequests.show',compact('UserRequest'));
    }
    public function store(Request $request, $request_id=null,$sp_id=null)
    {
        $request_id = $request->req_id;
        $details = UserRequest::find($request_id);

        //To Store New Messages
        $check= \App\Models\Message::create([
            'request_id' => $request_id,
            'sender_id' => Auth::user()->id,
            'receiver_id' => $details['user_id'],
            'content' => $request->content,
            'readtext' => '0',
        ]);

        //To Get All Messages
            $message = DB::table('messages')
            ->join('users as u1', 'messages.sender_id', '=', 'u1.id')
            ->join('users as u2', 'messages.receiver_id', '=', 'u2.id')
            ->select('messages.*','u1.first_name as sender_name','u2.first_name as receiver_name')
            ->where('messages.request_id',$request_id)
            ->where('messages.sender_id',Auth::user()->id)
            ->orWhere('messages.receiver_id',Auth::user()->id)
            ->orWhere('messages.sender_id',$details['user_id'])
            ->orWhere('messages.receiver_id',$details['user_id'])
            ->get();

        return view('ServiceProvider.viewrequests.message',compact('message','request_id'));
    }

    public function edit($request_id=null)
    {

        $details = UserRequest::find($request_id);
        //To Get All Messages
        $message = DB::table('messages')
            ->join('users as u1', 'messages.sender_id', '=', 'u1.id')
            ->join('users as u2', 'messages.receiver_id', '=', 'u2.id')
            ->select('messages.*','u1.first_name as sender_name','u2.first_name as receiver_name')
            ->where('messages.request_id',$request_id)
            ->where('messages.sender_id',Auth::user()->id)
            ->orWhere('messages.receiver_id',Auth::user()->id)
            ->orWhere('messages.sender_id',$details['user_id'])
            ->orWhere('messages.receiver_id',$details['user_id'])
            ->get();

//        dd($UserRequest);
        return view('ServiceProvider.viewrequests.message',compact('message','request_id'));
    }

    public function destroy(Request $userRequest)
    {
        $userRequest->delete();
        return redirect()->route('requests.index')
            ->with('success','deleted successfully');
    }

}
