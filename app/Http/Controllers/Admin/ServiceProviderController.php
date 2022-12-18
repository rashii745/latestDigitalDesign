<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Service_provider_profile;
use App\Models\Serviceprovider;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use DB;
use Auth;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceproviders = User::where('role','Service-Provider')->get();
        return view('admin.serviceproviders.index',compact('serviceproviders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serviceproviders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',

        ]);

        Serviceprovider::create($request->all());

        return redirect()->route('serviceproviders.index')
            ->with('success','SP created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serviceprovider  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Serviceprovider $serviceprovider)
    {
        return view('admin.serviceproviders.show',compact('serviceprovider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serviceprovider  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Serviceprovider $serviceprovider)
    {
        return view('admin.serviceproviders.edit',compact('serviceprovider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serviceprovider  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serviceprovider $serviceprovider)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'

        ]);
//        $user = Input::get();
        $serviceprovider->update($request->all());

        return redirect()->route('serviceproviders.index')
            ->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serviceprovider  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serviceprovider $serviceprovider)
    {
        $serviceprovider->delete();

        return redirect()->route('serviceproviders.index')
            ->with('success','deleted successfully');
    }

    public function viewfeedbacks()
    {
        $feedbacks = Feedback::latest()->paginate(5);
        $feedbacks= DB::table('feedbacks')
            ->join('users', 'users.id', '=', 'feedbacks.user_id')
            ->select('feedbacks.feedback_id','feedbacks.description','users.first_name','users.role')
            ->get();
        return view('ServiceProvider.viewfeedbacks.index',compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


}
