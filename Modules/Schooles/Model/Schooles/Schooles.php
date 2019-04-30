<?php

namespace Modules\Schooles\Model\Schooles;

use Illuminate\Database\Eloquent\Model;

class Schooles extends Model
{
    protected $fillable = ['schoole_name','country_id','city_id','stage_id'];

 
    public function users()
    {
        return $this->belongsToMany('App\user','UsersSchooles', 'user_id','schoole_id');
    }
  
    public function countries()
    {
        return $this->belongsTo('Modules\CountriesCities\Model\Country\Country','country_id');
    }
    public function cities()
    {
        return $this->belongsTo('Modules\CountriesCities\Model\city\city','city_id');
    }
    public function stages()
    {
        return $this->belongsTo('Modules\Stages\Model\Stages\Stages','stage_id');
    }
    protected $hidden = [
        'created_at','updated_at','country_id','city_id','stage_id'
    ];
}
