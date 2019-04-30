<?php

namespace Modules\Stages\Model\Stages;

use Illuminate\Database\Eloquent\Model;

class Stages extends Model
{
    protected $fillable = ['stage_name'];
    protected $hidden = [
        'updated_at','created_at'
    ];

}
