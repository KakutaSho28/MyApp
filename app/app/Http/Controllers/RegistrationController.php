<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Booking;
use App\Like;
use App\Mail;
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
    //いいね機能
    public function like(Request $request){
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $post_id = $request->post_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->post_id = $post_id; //Likeインスタンスにpost_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }
    public function index(Request $request){
        $posts = Post::withCount('likes')->orderBy('id', 'desc')->paginate(10);
        $param = [
            'posts' => $posts,
        ];
        return redirect('/', $param);
    }


}

