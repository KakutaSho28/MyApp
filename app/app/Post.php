<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;


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
    public function likes(){
        return $this->hasMany(Like::class,'post_id');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        //$data = Like::where('user_id', $user)->where('post_id', $this->id)->first() !==null; 
        return Like::where('user_id', $user)->where('post_id', $this->id)->first() !==null;
    }
}
