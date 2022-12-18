<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Feedback;
use App\Models\Service_provider_profiles;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ServiceProviderProfileController extends Controller
{

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */


    public function index()
    {
        $serviceproviderprofile = DB::table('users')
            ->leftJoin('service_provider_profiles', 'users.id', '=', 'service_provider_profiles.user_id')
            ->select('users.*','service_provider_profiles.specialization','service_provider_profiles.experience')
            ->where('users.id',Auth::user()->id)
            ->first();
//        dd($Service_provider_profile);
        return view('ServiceProvider.serviceproviderprofile.index', compact('serviceproviderprofile'));

    }
    public function create()
    {
        return view('ServiceProvider.serviceproviderprofile.create');
    }


    public function update(Request $request,$serviceproviderprofile)
    {
//        dd($request);

        $user = User::find($serviceproviderprofile);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->mob_no = $request['mob_no'];
        $user->save();


        $profile = Service_provider_profiles::where('user_id',$serviceproviderprofile)->first();
//        dd($profile);

        $profile->specialization = $request['specialization'];
        $profile->experience = $request['experience'];
        $profile->save();


        $serviceproviderprofile = DB::table('users')
            ->leftJoin('service_provider_profiles', 'users.id', '=', 'service_provider_profiles.user_id')
            ->select('users.*','service_provider_profiles.specialization','service_provider_profiles.experience')
            ->where('users.id',Auth::user()->id)
            ->first();

        return view('ServiceProvider.serviceproviderprofile.index', compact('serviceproviderprofile'));
    }
}




