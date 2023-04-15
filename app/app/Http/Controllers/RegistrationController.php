<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Booking;
use App\Http\Requests\CreatePost;
use App\Http\Requests\CreateUser;
use App\Http\Requests\EditUser;


use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function createPostForm(){//新規投稿
        return view('post_form');
    }
    public function createPost(CreatePost $request){
        $post = new Post;
        $post->title = $request->title;
        $post->date = $request->date;
        $post->category = $request->category;
        $post->workout = $request->workout;
        $post->spot = $request->spot;
        $post->price = $request->price;
        $post->text = $request->text;
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->route('home');
    }

    //投稿削除
    public function deletePost(Post $post){
        $post->delete();
        return redirect('/');
    }

    //投稿編集
    public function editPostForm(Post $post){
        return view('post_edit',[
            'post' => $post,
        ]);
    }
    public function editPost(Post $post, CreatePost $request){
        $colomns = ['title','date','category','workout','spot','price','text'];

        foreach($colomns as $column){
            $post->$column = $request->$column;
        }
        $post->save();

        return redirect('/');
    }

    //予約
    public function bookingDetailForm(Post $post){
        return view('booking',[
            'post' => $post,
            'user' => Auth::user(),
        ]);
    }
    public function bookingForm(Post $post){
        $booking = new Booking;
        $booking->post_id = $post->id;
        $booking->user_id = Auth::id();
        $booking->save();
        return redirect()->route('home');
    }

    //予約キャンセル
    public function bookingCancel(Booking $booking){
        $booking->delete();
        return redirect('/');
    }
    //アカウント編集
    public function editUserForm(User $user){
        return view('user_edit',[
            'user' => $user,
        ]);
    }
    public function editUser(User $user, EditUser $request){
        $colomns = ['img','name','kana','category','email','tel'];
        foreach($colomns as $column){
            $user->$column = $request->$column;
        }
        if($request->file('img') !== null){
            $dir = 'img';
            $file_name = $request->file('img')->getClientOriginalName();//アップロードされたファイル名を取得
            $request->file('img')->storeAs('public/' . $dir, $file_name);
            $user->img = $file_name;
        }
        $user->save();
        return redirect('/');
    }

    //アカウント削除
    public function deleteUser(User $user){
        $user->delete();
        return redirect('/');
    }
    //アカウント削除（一般ユーザ）
    public function softdelUser(User $user){
        $user->del_flg = 1;
        $user->save();
        return redirect('/');
    }

}

