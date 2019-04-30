<?php

namespace Modules\Uploads\Model\Uploads;

use Illuminate\Database\Eloquent\Model;
use DB;

class Uploads extends Model
{
    protected $fillable = ['title','description','link','views','liked','likes','city_id','schoole_id','stage_id','activty_id','user_id'];
 
    public function schooles()
    {
        return $this->belongsTo('Modules\Schooles\Model\Schooles\Schooles','schoole_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function cities()
    {
        return $this->belongsTo('Modules\CountriesCities\Model\city\city','city_id');
    }
    public function stages()
    {
        return $this->belongsTo('Modules\Stages\Model\Stages\Stages','stage_id');
    }
    public function activties()
    {
        return $this->belongsTo('Modules\Activties\Model\Activties\Activties','activty_id');
    }
    // public function liked()
    // {
    //     $user =DB::table('uploadlikes')->where('user_id', auth()->user()->id)->get();
    //     if($user) {return true;}else {return false;}

    // }
    public function likes()
    {
        return $this->belongsToMany('Modules\Uploads\Entities\Liked','uploadlikes', 'like_id','upload_id');
    }
    
    public function favourate()
    {
       return $this->belongsToMany('Modules\Uploads\Entities\Favourate','uploadfavourate', 'favourate_id','upload_id');
    }
  
    protected $hidden = [
        'updated_at', 'stage_id','city_id','activty_id','schoole_id','user_id'
    ];
    
}
