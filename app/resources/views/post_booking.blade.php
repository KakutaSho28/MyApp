@extends('layouts.layout')
@section('content')
<div class="flex-column m-auto">
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
                                <th scope='col'>開催日</th>
                                <th scope='col'>世代別カテゴリ</th>
                                <th scope='col'>ワークアウト</th>
                                <th scope='col'>開催場所</th>
                                <th scope='col'>料金</th>
                                <th scope='col'>備考</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ここに投稿を表示する -->
                                <tr>
                                    <th scope='col'>{{ $post['title'] }}</th>
                                    <th scope='col'>{{ $post['date'] }}</th>
                                    <th scope='col'>{{ config('const')[$post['category']] }}</th>
                                    <th scope='col'>{{ $post['workout'] }}</th>
                                    <th scope='col'>{{ $post['spot'] }}</th>
                                    <th scope='col'>{{ $post['price'] }}</th>
                                    <th scope='col'>{{ $post['text'] }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<div class='d-flex justify-content-center'>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('home') }}">
            <button class='btn'>戻る</button>
        </a>
    </div>
    <div class='d-flex mx-3 my-3'>
        @if(!isset($post->booking) == true) 
        <a href="{{ route('booking.detail',$post['id']) }}" onclick="return confirm('予約しますか？');">
            <button class='btn'>予約する</button>
        </a>
        @endif
    </div>
    <div class='d-flex mx-3 my-3'>
        @if(isset($post->booking) == true) 
        <a href="{{ route('booking.cancel',$post->booking->id) }}" onclick="return confirm('キャンセルしますか？');">
            <button class='btn '>キャンセルする</button>
        </a>
        @endif
    </div>
</div>
@endsection