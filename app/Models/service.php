<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class service extends Model
{
    use HasFactory;

    protected $fillable = [

        'service',
        'parent_id',
    ];

    protected $hidden = [

       
        'created_at',
		'updated_at',
    ];

    public function subservice(){

        return $this->hasMany('App\Models\service', 'parent_id'); //->with('subservice')

    }


    public function parent()
    {
        return $this->belongsTo('App\Models\service', 'parent_id')->with('parent');
    }


    public function bookings(){

        return $this->belongsToMany('App\Models\booking');

    }


}
