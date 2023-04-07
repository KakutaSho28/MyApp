<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function createPostForm(){//新規投稿
        return view('post_form');
    }
    public function createPost(Request $request){//新規投稿
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
        return redirect()->route('home.coach');
    }
}

