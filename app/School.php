<?php

namespace App;

use App\Traits\Sluggable;
use App\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{

    use SoftDeletes, SlugRoutable, Sluggable;


    protected $fillable = [
        'name', 'statut_id', 'date_creation', 'description', 'logo', 'cover', 'email', 'phone',
         'website', 'ville_id', 'quartier_id', 'latitude', 'longitude', 'video_url', 'facebook', 'twitter', 'linkedin',
        'scholarite_info', 'avantage_sup', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function quartier()
    {
        return $this->belongsTo(Quartier::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }

    public function galeries(){
        return $this->hasMany(Galery::class);
    }

   /*  public function schoolcover(){
        return $this->belongsTo(School::class);
    } */

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function avgRating()
    {
        return $this->ratings()
        ->selectRaw('sum(rating) as aggregate, school_id')
        ->groupBy('school_id');
    }
    public function getAvgRatingAttribute()
{
    if ( ! array_key_exists('avgRating', $this->relations)) {
       $this->load('avgRating');
    }

    $relation = $this->getRelation('avgRating')->first();

    return ($relation) ? $relation->aggregate : null;
}

    // récupérer les types pour chaque école
    public function hasType($typeId){
        return in_array($typeId, $this->types->pluck('id')->toArray());
    }

    // récupérer les examens pour chaque école
    public function hasExamen($typeId){
        return in_array($ExamenId, $this->examens->pluck('id')->toArray());
    }


    // supprimer le logo
    public function deleteLogo()
    {
        Storage::delete($this->logo);
    }
     // supprimer le cover
     public function deleteCover()
     {
         Storage::delete($this->cover);
     }

     public function examen(){
        return $this->hasMany(Examen::class);
    }

    public function fraisinscription(){
        return $this->hasMany(Fraisinscription::class);
    }

}
