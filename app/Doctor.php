<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{   
    $timestamps = false;
    protected $fillable = ['name','specialization','age'];
}
