<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Component;
use App\Models\Domain;
use App\Models\MessageModel;
use App\Models\OrderModel;
use App\Models\Product;
use App\Models\Subdomain;
use App\Models\RequestModel;
use App\Models\User;
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

        $templates = Component::where('type','template')->inRandomOrder()->limit(4)->get();

        return view('welcome',compact('domains','templates'));

    }
    public function textcreates($request_id=null)
    {
        $domains = Domain::all();

        foreach ($domains as $domain) {
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }

        $details = RequestModel::find($request_id);

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

        return view('textcreate',compact('message','domains','request_id'));
    }
    public function messageStore(Request $request, $request_id=null,$sp_id=null)
    {
        $request_id = $request->req_id;
        $details = RequestModel::find($request_id);
        //To Store New Messages
        $check= MessageModel::create([
            'request_id' => $request_id,
            'sender_id' => Auth::user()->id,
            'receiver_id' => $details['sp_id'],
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

        $domains = Domain::all();
        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        return view('textcreate',compact('domains','message', 'request_id'));
    }

    public function getmsg($request_id)
    {

        $data = RequestModel::find($request_id);
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
    public function requests($id=null)
    {
        $domains = Domain::all();
        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }

        return view('request',compact('domains','id'));
    }

    public function requestStore(Request $request)
    {
        $request->validate([
            'description' => ['required','string','max:255']
        ]);

        $response = RequestModel::create([
            'client_id' => Auth::user()->id,
            'sp_id' => $request->sp,
            'description' => $request->description
        ]);

        $id = $request->sp;
        $domains = Domain::all();
        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        return view('request',compact('domains','id'));
    }

    public function requesthistory($id = null)
    {

        $domains = Domain::all();
        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        $user_requests = DB::table('requests')
            ->join('users as u1', 'requests.client_id', '=', 'u1.id')
            ->join('users as u2', 'requests.sp_id', '=', 'u2.id')
            ->select('requests.*','u1.first_name as client_name','u2.first_name as sp_name')
            ->where('requests.client_id',Auth::user()->id)
            ->where('requests.sp_id',$id)
            ->get();

        return view('viewrequest',compact('user_requests','domains'));
    }


    public function products($id = null)
    {
        $domains = Domain::all();
        $users =User::where('role', 'Service-Provider')->get();
        foreach ($domains as $domain) {
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        if($id == null){

            $products = Product::all();
        }
        else

        {

            $products = Product::where('subdomain_id',$id)->get();
        }
        return view('products',compact('domains','products'));
    }
    public function serviceproviders()
    {
        $domains = Domain::all();
        $users =User::where('role', 'Service-Provider')->get();
        foreach ($domains as $domain) {
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }

        return view('serviceproviders',compact('domains','users'));
    }


    public function editDesign($id = null)
    {

        $template = '';
        if($id){
            $template = Component::find($id);
        }
        $components = Component::where('type','component')->get();
        $domains = Domain::all();

        foreach ($domains as $domain){
            $domain['subdomains'] = Subdomain::where('domain_id', $domain['domain_id'])->get();
        }
        return view('editDesign',compact('domains','template' , 'components'));
    }

    public function movePic(Request $request){

        $image=$_POST['image'];
        $image=explode(";", $image)[1];
        $image=explode(",", $image)[1];
        $image=str_replace(" ", "+",$image);
        $image=base64_decode($image);
        file_put_contents(".\uploads\image.png", $image);
       /* $image = "image" . time() . "." . $image->guessExtension();
        $image->move(".\uploads\image.png", $image);*/
        return 'Done';
    }
}
