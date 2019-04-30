<?php

namespace Modules\Uploads\Entities;

use Illuminate\Database\Eloquent\Model;

class Favourate extends Model
{
    
    // protected $table='uploadfavourate';
    protected $fillable = ['id'];

    public function uploads()
    {
        return $this->belongsToMany('Modules\Uploads\Model\Uploads\Uploads','uploadfavourate', 'favourate_id','upload_id');
    }
    protected $hidden=[
        'favourate_id','upload_id','favourate','created_at','users'
    ]; 
}
