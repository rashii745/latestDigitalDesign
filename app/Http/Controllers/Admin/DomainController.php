<?php

namespace App\Http\Controllers;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Domain::latest()->paginate(5);
        return view('admin.domains.index',compact('domains'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.domains.create');
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
            'domain_name' => 'required',

        ]);
        Domain::create($request->all());

        $domains = Domain::latest()->paginate(5);
//        return view('admin.domains.index',compact('domains'))
//            ->with('i', (request()->input('page', 1) - 1) * 5);
        return redirect()->route('domains.index')
            ->with('success','Domain created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        return view('admin.domains.show',compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        return view('admin.domains.edit',compact('domain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        $request->validate([
            'domain_name' => 'required',
        ]);

        $domain->update($request->all());
//        dd($domain);
        $domains = Domain::latest()->paginate(5);
        return view('domains.index',compact('domains'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

//        return redirect()->back()->with('success','Domain updated successfully');
//        return redirect()->route('admin.domains.index')->with('success','Domain updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect()->route('domains.index')
            ->with('success','domains deleted successfully');
    }
}
