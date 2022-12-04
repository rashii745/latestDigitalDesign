<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Offer_service;

use Illuminate\Http\Request;

class OfferServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer_services = Offer_service::latest()->paginate(5);

        return view('offer_services.index',compact('offer_services'))
                ->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer_service  $offer_service
     * @return \Illuminate\Http\Response
     */
    public function show(Offer_service $offer_service)
    {
            return view('offer_services.show',compact('offer_service'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offerservice  $offerservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Offerservice $offerservice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offerservice  $offerservice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offerservice $offer_service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offerservice  $offerservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offerservice $offerservice)
    {
        //
    }
}
