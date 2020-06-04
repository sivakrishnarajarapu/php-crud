<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentinfo extends Model
{
    protected $fillable = [
        'student_ID','name','email','school','program','batch','image'
    ];
    public $timestamps =false;
}
