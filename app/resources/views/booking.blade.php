@extends('layouts.layout')
@section('content')
<div class="row justify-content-center">
        <div class="card mt-3">
            <div class="card-header">
                <div class='text-center'>予約確認</div>
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
<div class="row justify-content-center">
        <div class="card mt-3">
            <div class="card-header">
                <div class='text-center'>会員情報</div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                        <tr>
                                <th scope='col'>名前</th>
                                <th scope='col'>ふりがな</th>
                                <th scope='col'>メール</th>
                                <th scope='col'>カテゴリ</th>
                                <th scope='col'>電話番号</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ここに投稿を表示する -->
                                <tr>
                                    <th scope='col'>{{ $user['name'] }}</th>
                                    <th scope='col'>{{ $user['kana'] }}</th>
                                    <th scope='col'>{{ $user['email'] }}</th>
                                    <th scope='col'>{{ config('const')[$user['category']] }}</th>
                                    <th scope='col'>{{ $user['tel'] }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<div class="text-center">上記の内容で予約しますか？</div>
<div class='d-flex justify-content-center'>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('home') }}">
            <button class='btn btn-secondary'>戻る</button>
        </a>
    </div>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('booking.post',$post['id']) }} ">
            
            <button class='btn btn-secondary'>予約する</button>
        </a>
    </div>
</div>
@endsection