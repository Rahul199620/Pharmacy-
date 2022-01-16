<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    public $timestamps = false;
    protected $fillable = ['doc_name','option_name','carry_forward','value_dependent','min_value'];
}
