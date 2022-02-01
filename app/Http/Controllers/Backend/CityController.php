<?php

namespace App\Http\Controllers\Backend;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::latest()->get();
        return view('backend.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::latest()->get();
        return view('backend.city.create',compact('states'));
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
            'state_id' =>  'required',
            'name' => 'required',
        ]);
        City::create([
            'state_id' => $request->state_id,
            'name' =>$request->name,
        ]);
        return redirect()->route('cities.index')->with('msg','Data created Successfully!');
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
    public function edit(Request $request ,City $city)
    {
        $states = State::latest()->get();
        return view('backend.city.edit',compact('states','city'));
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
            'state_id' => ['required'],
            'name' => 'required',
        ]);
        $state->Update([
            'state_id' => $request->state_id,
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
    public function destroy(City $city)
    {

        $city->delete();
        return redirect()->back()->with('msg','Data deleted Successfully!');
    }
}
