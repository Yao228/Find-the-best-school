<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fraisinscription extends Model
{
    protected $fillable = ['niveau_etude', 'frais', 'school_id'];

    public function school(){
        return $this->belongsTo(School::class);
    }
}
