<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function employees(){
        $this->hasMany(Employee::class);
    }
}
