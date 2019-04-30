<?php

namespace Modules\Student\Model\Student;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_name','schoole_id','city_id','country_id','stage_id'];
    public function schooles()
    {
        return $this->belongsTo('Modules\Schooles\Model\Schooles\Schooles','schoole_id');
    }
    public function cities()
    {
        return $this->belongsTo('Modules\CountriesCities\Model\city\city','city_id');
    }
    public function countries()
    {
        return $this->belongsTo('Modules\CountriesCities\Model\country\country','country_id');
    }
    public function stages()
    {
        return $this->belongsTo('Modules\Stages\Model\Stages\Stages','stage_id');
    }
    protected $hidden = [
        'updated_at','created_at','schoole_id','city_id','country_id','stage_id'
    ];
}
