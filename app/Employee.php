<?php

namespace App;

use App\City;
use App\State;
use App\Country;
use App\Department;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'f_name',
        'm_name',
        'l_name',
        'address',
        'department_id',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'birthdate',
        'date_hired'
    ];

    public function departments(){
        $this->belongsTo(Department::class);
    }
    public function countries(){
        $this->belongsTo(Country::class);
    }
    public function cities(){
        $this->belongsTo(City::class);
    }
    public function states(){
        $this->belongsTo(State::class);
    }
}
