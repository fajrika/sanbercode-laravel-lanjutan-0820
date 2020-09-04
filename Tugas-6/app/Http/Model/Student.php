<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'faculty', 'majors'
    ];
}
