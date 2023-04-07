<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\DisplayController;
use App\Http\Contorollers\RegistrationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/post/{post}/detail','DisplayController@postDetail')->name('post.detail');//投稿内容詳細表示
Route::get('/user/{user}/detail','DisplayController@userDetail')->name('user.detail');//一般ユーザ詳細表示


Route::get('/create_post','RegistrationController@createPostForm')->name('create.post');//新規投稿
Route::post('/create_post','RegistrationController@createPost');



Route::group(['middleware' => 'auth'],function(){
    Route::get('/','DisplayController@index')->name('home.coach');//メインページ

});