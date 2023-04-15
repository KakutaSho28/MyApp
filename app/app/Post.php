<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'date',
        'category',
        'workout',
        'spot',
        'price',
        'text',
    ];
    
    public function booking(){
        return $this->hasOne('App\Booking','post_id','id');
    }
}
