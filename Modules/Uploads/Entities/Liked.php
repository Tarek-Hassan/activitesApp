<?php

namespace Modules\Uploads\Entities;

use Illuminate\Database\Eloquent\Model;

class Liked extends Model
{
    protected $fillable = ['id'];
    
    public function uploads()
    {
        return $this->belongsToMany('Modules\Uploads\Model\Uploads\Uploads','uploadlikes', 'like_id','upload_id');
    }
}
