<?php

namespace Modules\Category\Model\Category;

 use QCod\ImageUp\HasImageUploads;
use Illuminate\Database\Eloquent\Model;

  
class Category extends Model
{
    use HasImageUploads;
    protected $fillable = ['title','description','image','user_id'];
    
    protected static $imageFields = [
        'image',
    ];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

}
