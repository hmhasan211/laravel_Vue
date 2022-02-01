<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'country_code','name'
    ];

    public function State(){
        return $this->hasMany(State::class);
    }

    public function employees(){
        $this->hasMany(Employee::class);
    }
}
