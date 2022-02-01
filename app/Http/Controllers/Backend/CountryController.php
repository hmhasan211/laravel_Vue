<?php

namespace App\Http\Controllers\Backend;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Countries = Country::latest()->get();
        return view('backend.country.index',compact('Countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Country $country)
    {
        $request->validate([
            'country_code' =>  ['required', 'min:3'],
            'name' => 'required',
        ]);
        Country::create([
            'country_code' => $request->country_code,
            'name' =>$request->name,
        ]);
        return redirect()->route('countries.index')->with('msg','Data created Successfully!');
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
    public function edit(Country $country)
    {
        return view('backend.country.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Country $country)
    {

        $request->validate([
            'country_code' => ['required', 'min:3'],
            'name' => 'required',
        ]);
        $country->Update([
            'country_code' => $request->country_code,
            'name' =>$request->name,
        ]);
        return redirect()->route('countries.index')->with('msg','Data created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {

        $country->delete();
        return redirect()->back()->with('msg','Data deleted Successfully!');
    }
}
