<?php

namespace Modules\CountriesCities\Model\Country;


use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $fillable = ['country_name','selected'];
    
    public function cities(){
        return $this->hasMany('Modules\CountriesCities\Model\City\City','country_id');
    }
    public function schooles()
    {
        return $this->hasMany('Modules\Schooles\Model\Schooles\Schooles','country_id');
    }
    public function students()
    {
      
         return $this->hasMany('Modules\Student\Model\Student\Student','country_id');
    }
    protected $hidden = [
        'updated_at','created_at','selected'
    ];

}
