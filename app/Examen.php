<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $fillable = ['exam_name', 'year_exam', 'exam_percentage', 'school_id'];

    public function school(){
        return $this->belongsTo(School::class);
    }
}
