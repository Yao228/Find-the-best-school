<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['rating', 'rate_name', 'rate_mail', 'comment', 'school_id'];

    public function schools(){
        return $this->belongsTo(School::class);
    }
}
