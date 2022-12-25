<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Subdomain;
use Illuminate\Http\Request;

class SubDomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdomains = Subdomain::latest()->paginate(100);
        return view('admin.subdomains.index',compact('subdomains'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subdomains.create');
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
            'subdomain_name' => 'required',

        ]);
        Subdomain::create($request->all());
        return redirect()->route('subdomains.index')
            ->with('success','Subdomain created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subdomain  $subdomain
     * @return \Illuminate\Http\Response
     */
    public function show(Subdomain $subdomain)
    {
        return view('admin.subdomains.show',compact('subdomain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subdomain $subdomain
     * @return \Illuminate\Http\Response
     */
    public function edit(Subdomain $subdomain)
    {
        return view('admin.subdomains.edit',compact('subdomain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subdomain  $subdomain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subdomain $subdomain)
    {
        $request->validate([
            'subdomain_name' => 'required',

        ]);

        $subdomain->update($request->all());
        return redirect()->route('subdomains.index')
            ->with('success','Subdomain updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subdomain  $subdomain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subdomain $subdomain)
    {
        $subdomain->delete();

        return redirect()->route('subdomains.index')
            ->with('success','Subdomain deleted successfully');
    }
}
