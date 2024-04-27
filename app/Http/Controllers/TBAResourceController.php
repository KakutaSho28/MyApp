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




class TBAResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $create)
    {
        return view('post_edit',[
            'post' => $create,
        ]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $create, CreatePost $request)
    {
        $colomns = ['title','date','category','workout','spot','price','text'];

        foreach($colomns as $column){
            $create->$column = $request->$column;
        }
        $create->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $create)
    {
        $create->delete();
        return redirect('/');
    }
}
