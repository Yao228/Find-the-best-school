<?php
namespace App\Traits;

trait Sluggable{
    public static function boot(){
        parent::boot();

        static::creating(function($school){
            $school->slug = str_slug($school->name);
        });

        static::creating(function($statut){
            $statut->slug = str_slug($statut->name);
        });
    }

}