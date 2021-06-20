<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','age','admitted_date','checkout_date','doctor_id'];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor', 'doctor_id');
    }
}
