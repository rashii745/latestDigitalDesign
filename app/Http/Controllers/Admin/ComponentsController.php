<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Component;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Component::latest()->paginate(5);
        return view('admin.components.index',compact('components'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.components.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Component $component)
    {
//        dd($component);
        return view('admin.components.show',compact('component'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Component $component, $component_id=null)
    {
        $component_id = $request->id;
        $request->validate([
            'name' => 'required',
            'avatar' => 'required|mimes:pdf,jpeg,jpg,png,gif|max:2048',
        ]);

        // File upload here
        $fileName = '';
        $file = $request->file('avatar');

        if ($file) {

            $destinationPath = public_path('admin/components');
            $fileName = "avatar_" . time() . "." . $file->guessExtension();
            $file->move($destinationPath, $fileName);
        }

        $request['image'] = $fileName;
        Component::create($request->all());

        return view('admin.components.create',compact('component','component_id'))
            ->with('success','Component added successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component)
    {
        $component->delete();
        return redirect()->route('components.index')
            ->with('success','Component deleted successfully');
    }
}
