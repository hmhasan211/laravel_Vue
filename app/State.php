<?php

namespace App;

use App\City;
use App\Employee;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'country_id','name'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->hasMany(City::class);
    }

    public function employees(){
        $this->hasMany(Employee::class);
    }
}
