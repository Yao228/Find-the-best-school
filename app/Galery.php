<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillable = ['school_id', 'images'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
