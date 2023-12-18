<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    protected $fillable=[

        'halls_id',
        'event'

    ];
    protected $hidden = [

        
        'created_at',
		'updated_at',
    ];

    public function halls(){

        return $this->belongsTo('App\Models\halls');
    }

}
