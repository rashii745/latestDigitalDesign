<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use DB;
class UserRequestController extends Controller
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
        return view('admin.requests.index',compact('UserRequests'))
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
        return view('admin.requests.show',compact('UserRequest'));
    }


    public function destroy(Request $userRequest)
    {
        $userRequest->delete();
        return redirect()->route('requests.index')
            ->with('success','deleted successfully');
    }

}
