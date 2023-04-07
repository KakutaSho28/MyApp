<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index() {//ロール分け、投稿内容をメインページに表示
        $post = new Post;
        $posts = $post->where('user_id',auth::user()->role == 0)->get();

        $user = new User;
        $users = $user->where('role', 1)->get();
        if(auth::user()->role == 0){//0のときは管理者のため、管理者のメインページ
            return view('home_coach',[
                'posts' => $posts,
                'users' => $users,
            ]);
        }elseif(auth::user()->role == 1){//1のときは一般ユーザのため、一般ユーザのメインページ
            return view('home_user',[
                'posts' => $posts,
            ]);
        }
    }
    public function postDetail(){
        return view('post_detail',[
            'posting' => $posting,
        ]);
    }

}
