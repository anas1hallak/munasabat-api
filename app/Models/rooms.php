<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;

    protected $fillable=[

        'halls_id',
        'name',
        'numOfSeats'

        ];

        protected $hidden = [

            
            'created_at',
            'updated_at',
        ];

    public function bookings(){

        return $this->hasMany('App\Models\booking');
    }

    public function days(){

        return $this->hasMany('App\Models\day');
    }
}

