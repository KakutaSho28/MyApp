<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id','post_id',
    ];

    public function post(){
        return $this->belongsTo('App\Post','post_id','id'); //
    }
    public function user(){
        return $this->belongsTo('App\User','user_id','id'); //
    }
}
