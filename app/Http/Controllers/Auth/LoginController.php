<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use App\Models\Domain;
use App\Models\Subdomain;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = '/detail';
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
    protected function redirectTo()
    {
        if (auth()->user()->role == 'client') {
            return '/';
        }
        //return '/home';
        $domains = Domain::all();
        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        return view('welcome',compact('domains'));


    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
