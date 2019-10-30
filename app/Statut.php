<?php

namespace App;

use App\Traits\Sluggable;
use App\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use SlugRoutable, Sluggable;
    
    protected $fillable = ['name'];

    
    public function school(){
        return $this->hasMany(School::class);
    }
    
}
