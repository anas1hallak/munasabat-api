<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $hidden = [

        
        'created_at',
		'updated_at',
    ];
    public function services(){

        return $this->belongsToMany('App\Models\service');

    }
}
