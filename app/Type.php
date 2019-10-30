<?php

namespace App;

use App\Traits\Sluggable;
use App\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use SlugRoutable, Sluggable;
    
    protected $fillable = ['name'];

    public function schools(){
        return $this->belongsToMany(School::class);
    }
}
