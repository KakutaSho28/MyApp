<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(Request $request) {//ロール分け、投稿内容をメインページに表示
        switch ($request->keyword) {
            case '一般':
                $value = 0;
                break;
            case 'U-12':
                $value = 1;
                break;
            case 'U-15':
                $value = 2;
                break;
            case 'U-18':
                $value = 3;
                break;
            default :
                $value = $request->keyword;
                break ;
        }
        if(isset($request->keyword) && $request->type == 'post'){//投稿検索（フリーワード検索）
            $posts = Post::where('title', 'like', '%'.$request->keyword.'%')
                            ->orWhere('date', 'like', '%'.$request->keyword.'%')
                            ->orWhere('category', 'like', '%'.$value.'%')
                            ->get();
        }else{
            $posts = Post::all();
        }
        if(auth::user()->role == 0){//0のときは管理者のため、管理者のメインページ
            $user = new User;
            $users = $user->where('role', 1)->get();
            if(isset($request->keyword) && $request->type == 'user'){//一般ユーザ検索
                $users = User::whereHas('user', function ($query) use ($request) {//管理者がユーザー情報を管理する処理
                    $query->where('name', 'like', '%'.$request->keyword.'%')
                        ->orWhere('category', 'like', '%'.$request->keyword.'%');
                })->where('id',auth::id())
                ->get();
            }else{
                $users = $user->where('role', 1)->get();
            }
            return view('home_coach',[
                'posts' => $posts,
                'users' => $users,
            ]);
        }

        if(auth::user()->role == 1){//1のときは一般ユーザのため、一般ユーザのメインページ
            if(isset($request->keyword) && $request->type == 'booking'){
                $bookings = Booking::whereHas('post', function ($query) use ($request) {//予約検索
                    $query->where('title', 'like', '%'.$request->keyword.'%')
                        ->orWhere('date', 'like', '%'.$request->keyword.'%')
                        ->orWhere('spot', 'like', '%'.$request->keyword.'%');
                })->where('user_id',auth::id())
                ->get();
            }else{
                $bookings = Booking::where('user_id',auth::id())->get();
            }
            return view('home_user',[
                'posts' => $posts,
                'bookings' => $bookings,
            ]);
        }
    }
    public function Account(User $user){
        if(auth::user()->role == 0){//0のときは管理者のため、管理者のメインページ
            $user = new User;
            $users = $user->where('role', 1)->get();
            if(isset($request->keyword) && $request->type == 'user'){//一般ユーザ検索
                $users = User::whereHas('user', function ($query) use ($request) {//管理者がユーザー情報を管理する処理
                    $query->where('name', 'like', '%'.$request->keyword.'%')
                        ->orWhere('category', 'like', '%'.$request->keyword.'%');
                })->where('id',auth::id())
                ->get();
            }else{
                $users = $user->where('role', 1)->get();
            }
            return view('account',[
                'users' => $users,
            ]);
        }
    }
    public function postDetail(Post $post){//投稿詳細
        $bookings = Booking::all();
        return view('post_detail',[
            'post' => $post,
            'bookings' => $bookings,
        ]);
    }
    public function postBooking(Post $post){//投稿詳細（予約）
        return view('post_booking',[
            'post' => $post,
        ]);
    }
    public function likedPost(Post $post){//いいねした投稿一覧
        $posts = Post::all();
        return view('liked_post',[
            'posts' => $posts,
        ]);
    }
    public function userDetail(User $user){
        return view('user_detail',[
            'user' => $user,
        ]);
    }

}
