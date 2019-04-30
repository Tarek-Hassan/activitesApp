<?php

namespace Modules\Activties\Model\Activties;

use Illuminate\Database\Eloquent\Model;
use DB;

class Activties extends Model
{
    protected $fillable = ['id','activity_name','user_id'];
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
    public function uploads(){
            return $this->hasMany('Modules\Uploads\Model\Uploads\Uploads','activty_id');   
    }
    protected $hidden = [
        'user_id','created_at','updated_at','users',
    ];
}
