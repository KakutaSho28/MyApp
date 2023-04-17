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
Route::get('/post/{id}/detail','DisplayController@postBooking')->name('post.booking');//投稿内容詳細表示(予約)
Route::get('/user/{user}/detail','DisplayController@userDetail')->name('user.detail');//一般ユーザ詳細表示
Route::get('/liked/{id}','DisplayController@likedPost')->name('liked.post');//いいねした投稿表示



Route::get('/create_post','RegistrationController@createPostForm')->name('create.post');//新規投稿
Route::post('/create_post','RegistrationController@createPost');
Route::get('/edit_postform/{post}','RegistrationController@editPostForm')->name('edit.post');//投稿内容変更
Route::post('/edit_postform/{post}','RegistrationController@editPost');
Route::get('/delete_postform/{post}','RegistrationController@deletePost')->name('delete.post');//投稿内容削除
Route::get('/booking_form/{post}','RegistrationController@bookingDetailForm')->name('booking.detail');//予約詳細
Route::get('/booking_create/{post}','RegistrationController@bookingForm')->name('booking.post');
Route::get('/booking_cancel/{booking}','RegistrationController@bookingCancel')->name('booking.cancel');//予約キャンセル

Route::post('/like','RegistrationController@like')->name('liked.post');//いいね処理


Route::get('/edit_userform/{user}','RegistrationController@editUserForm')->name('user.edit');//アカウント変更
Route::post('/edit_userform/{user}','RegistrationController@editUser');
Route::get('/delete_userform/{user}','RegistrationController@deleteUser')->name('delete.user');//アカウント削除
Route::get('/softdel_userform/{user}','RegistrationController@softdelUser')->name('softdel.user');//アカウント論理削除





Route::group(['middleware' => 'auth'],function(){
    Route::get('/','DisplayController@index')->name('home');//メインページ
    Route::post('/','DisplayController@index');//メインページ


});