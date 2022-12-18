<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Domain;
use App\Models\OrderModel;
use App\Models\Product;
use App\Models\Subdomain;
use App\Models\RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $domains = Domain::all();

        foreach ($domains as $domain)
        {
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }

        //dd($domains);

        return view('welcome',compact('domains'));

    }
    public function orders()
    {
        $domains = Domain::all();

        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        return view('order',compact('domains'));
    }
    public function contact()
    {
        $domains = Domain::all();

        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }

        return view('contact',compact('domains'));
    }
    public function supports()
    {
        $domains = Domain::all();

        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }

        return view('support',compact('domains'));
    }
    public function requests()
    {
        $domains = Domain::all();

        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }

        return view('request',compact('domains'));
    }

    public function requestStore(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'description' => ['required','string','max:255']
        ]);

        $id = Auth::id();
        $response = RequestModel::create([
            'user_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description
        ]);

        $domains = Domain::all();
        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        return view('request',compact('domains'));

    }

    public function forOrder(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mob_no' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $orders = OrderModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'mob_no' => $request->mob_no,
            'description' => $request->description,
        ]);
        $domains = Domain::all();
        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        return view('order',compact('domains'));
    }

    public function products($id = null)
    {
        if($id == null){
            $products = Product::all();
        }else{
            $products = Product::where('subdomain_id',$id)->get();
        }

        return view('products',compact('products'));
    }
}
