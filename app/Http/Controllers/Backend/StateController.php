<?php

namespace App\Http\Controllers\Backend;

use App\State;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::latest()->get();
        return view('backend.state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Countries = Country::latest()->get();
        return view('backend.state.create',compact('Countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,State $state)
    {
        $request->validate([
            'country_id' =>  'required',
            'name' => 'required',
        ]);
        State::create([
            'country_id' => $request->country_id,
            'name' =>$request->name,
        ]);
        return redirect()->route('states.index')->with('msg','Data created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,State $state)
    {
        $countries = Country::latest()->get();
        return view('backend.state.edit',compact('countries','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,State $state)
    {

        $request->validate([
            'country_id' => ['required'],
            'name' => 'required',
        ]);
        $state->Update([
            'country_id' => $request->country_id,
            'name' =>$request->name,
        ]);
        return redirect()->route('states.index')->with('msg','Data created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {

        $state->delete();
        return redirect()->back()->with('msg','Data deleted Successfully!');
    }
}
