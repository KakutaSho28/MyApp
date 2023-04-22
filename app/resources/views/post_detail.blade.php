@extends('layouts.layout')
@section('content')
    <div class="row justify-content-center">
        <div class="card mt-3">
            <div class="card-header">
                <div class='text-center'>投稿内容</div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>タイトル</th>
                                <th scope='col'>{{ $post['title'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>開催日</th>
                                <th scope='col'>{{ $post['date'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>世代別カテゴリ</th>
                                <th scope='col'>{{ config('const')[$post['category']] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>ワークアウト</th>
                                <th scope='col'>{{ $post['workout'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>開催場所</th>
                                <th scope='col'>{{ $post['spot'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>料金</th>
                                <th scope='col'>{{ $post['price'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>備考</th>
                                <th scope='col'>{{ $post['text'] }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@if(Auth::user()->role == 0)
    <div class="row justify-content-center">
        <div class="card mt-3">
            <div class="card-header">
                <div class='text-center'>予約者一覧</div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>名前</th>
                                <th scope='col'>世代別カテゴリ</th>
                            </tr>
                        </thead>
                        @if(isset($post->booking) == true)
                        <tbody>
                            <!-- ここに投稿を表示する -->
                            @foreach($bookings as $booking)
                                <tr>
                                    <th scope='col'>{{ $booking->user->name }}</th>
                                    <th scope='col'>{{ config('const')[$booking->user->category] }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Auth::user()->role == 1)
<div class='row justify-content-center'>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('home') }}">
            <button class='btn btn-secondary'>戻る</button>
        </a>
    </div>
    <div class='d-flex mx-3 my-3'>
        @if(!isset($post->booking) == true) 
        <a href="{{ route('booking.detail',$post['id']) }}">
            <button class='btn'>予約する</button>
        </a>
        @endif
    </div>
    <div class='d-flex mx-3 my-3'>
        @if(isset($post->booking) == true) 
        <a href="{{ route('booking.cancel',$post->booking->id) }}">
            <button class='btn'>キャンセルする</button>
        </a>
        @endif
    </div>
</div>
@endif
@if(Auth::user()->role == 0)
<div class='row justify-content-center'>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('delete.post',$post['id'])}} ">
            <button class='btn'>投稿削除</button>
        </a>
    </div>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('edit.post',$post['id']) }}">
            <button class='btn'>投稿編集</button>
        </a>
    </div>
</div>
@endif
@endsection