<?php
namespace App\Traits;

trait SlugRoutable{
    
    public function getRouteKeyName(){
        return 'slug';
    }
}