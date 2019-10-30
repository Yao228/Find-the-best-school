<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = ['name'];

    public function school(){
        return $this->hasMany(School::class);
    }

    public function quartier(){
        return $this->hasMany(Quartier::class);
    }
}
