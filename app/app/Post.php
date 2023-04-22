<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use Illuminate\Support\Facades\Auth;



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
        // return $this->hasOne('App\Booking','post_id','id');
        $x = $this->hasOne('App\Booking','post_id','id');
        $x = $x->where('user_id',Auth::id());
        return $x;
    }
    public function user(){
        return $this->hasOne('App\User','post_id','id');
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
