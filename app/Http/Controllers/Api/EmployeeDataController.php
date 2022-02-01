<?php

namespace App\Http\Controllers\Api;

use App\State;
use App\Country;
use App\Department;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreReques;

class EmployeeDataController extends Controller
{
    public function Country()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function state(Country $country)
    {
        return response()->json($country->State);
    }

    public function city(State $state)
    {
        return response()->json($state->city);
    }

    public function department()
    {
        $depts = Department::latest()->get();
        return response()->json($depts);
    }

    public function storeEmployee(EmployeeStoreReques $request)
    {
        $emp = Employee::create($request->validated());
        return response()->json($emp);
    }
}
