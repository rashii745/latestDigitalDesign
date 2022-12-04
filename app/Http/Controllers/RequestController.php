<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Requested;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RequestController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('auth.request');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'description' => ['required','string','max:255'],
        ]);

        $request = Request::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);

       event(new Request($request));

        Auth::store($request);
        return redirect()->with('success','successfully.');

    }
}
