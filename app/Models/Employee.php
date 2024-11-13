<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['nama','gender','phone','address','email','status','hired_on'];
    public $timestamps = false;
}
