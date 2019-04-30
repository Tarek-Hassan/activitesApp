<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use QCod\ImageUp\HasImageUploads;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','phone','role','api_token'
    ];
    protected static $imageFields = [
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email','role','phone','email_verified_at','created_at','updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    //
    public function category(){
        return $this->hasMany('Modules\Category\Model\Category\Category','user_id');

    }
    public function Advrtisment(){
        return $this->hasMany('Modules\Setting\Model\Advrtisment\Advrtisment','user_id');

    }
    public function Activties(){
        return $this->hasMany(' Modules\Activties\Model\Activties\Activties','user_id');

    }
    public function schooles()
    {
        return $this->belongsToMany('Modules\Schooles\Model\Schooles\Schooles','UsersSchooles', 'user_id','schoole_id');
    }
    public function uploads()
    {
        return $this->belongsTo('Modules\Uploads\Model\Uploads\Uploads','user_id');
    }
}
