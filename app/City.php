<?php

namespace App;

use App\State;
use App\Employee;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = ['state_id','name'];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function employees(){
        $this->hasMany(Employee::class);
    }
}
