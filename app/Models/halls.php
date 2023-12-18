<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class halls extends Authenticatable implements JWTSubject

{
    use HasFactory;
    protected $fillable=[
        'name',
        'mobile1',
        'mobile2',
        'mobile3',
        'phone',
        'social_email',
        'address',
        'email',
        
    ];

    protected $hidden = [

        'password',
        'created_at',
		'updated_at',
    ];

    public function room(){

        return $this->hasMany('App\Models\rooms');
    }

    public function services(){

        return $this->hasMany('App\Models\service');
    }

    public function events(){

        return $this->belongsToMany('App\Models\events');
    }

   

    public function image(){

        return $this->hasMany('App\Models\image');


    }


      /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
