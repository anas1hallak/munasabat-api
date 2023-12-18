<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class users extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable=[

        'fullName',
        'mobile',
        'email',
        'image'
    ];

    protected $hidden = [

            'password',
            'created_at',
            'updated_at',
        ];
    

    public static function find(string $id)
    {
    }

    public function bookings(){

        return $this->hasMany('App\Models\booking');
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
