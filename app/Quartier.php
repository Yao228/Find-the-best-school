<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quartier extends Model
{
    protected $fillable = ['name', 'ville_id'];

    
    public function school(){
        return $this->hasMany(School::class);
    }

   /*  public function ville(){
        return $this->belongsTo(Ville::class);
    } */
}
