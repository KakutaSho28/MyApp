@extends('layouts.layout')

@section('content')
<div class="text-center">
    <div class="row">
        <div class="card m-auto">
            <div class="card-header">
                <div class='text-center'>投稿一覧</div>
                <div class='row justify-content-around mt-3 mb-3'>
                    <form action="/" method="POST">
                        @csrf
                        <input type='text' name='keyword' class='' placeholder='条件検索'>
                        <input type='hidden' name='type' class='' value='post'>
                        <button type='submit' class='btn btn-primary'>検索</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>タイトル</th>
                                <th scope='col'>開催日時</th>
                                <th scope='col'>世代別カテゴリ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ここに投稿内容を表示する -->
                            @foreach($posts as $post)
                                <tr>
                                    <th scope='col'>{{ $post['title'] }}</th>
                                    <th scope='col'>{{ $post['date'] }}</th>
                                    <th scope='col'>{{ config('const')[$post['category']] }}</th>
                                    <th scope='col'><button type='hidden' class='btn btn-info'>いいね</button></th>
                                    <th scope='col'><button type='hidden' class='btn btn-secondary'>コメント</button></th>
                                    <th scope='col'><a href="{{ route('post.booking',$post['id']) }}">詳細</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="card m-auto">
            <div class="card-header">
                <div class='text-center'>予約確認</div>
                <div class='row justify-content-around mt-3 mb-3'>
                    <form action="/" method="POST">
                        @csrf
                        <input type='text' name='keyword' class='' placeholder='条件検索' value="{{ old('keyword') }}">
                        <input type='hidden' name='type' class='' value='booking'>
                        <button type='submit' class='btn btn-primary'>検索</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>予約一覧</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ここに登録ユーザを表示する -->
                            @foreach($bookings as $booking)
                            <tr>
                                <th scope='col'>{{ $booking->post->title }}</th>
                                <th scope='col'>{{ $booking->post->date }}</th>
                                <th scope='col'>{{ $booking->post->workout }}</th>
                                <th scope='col'>{{ $booking->post->spot }}</th>
                                <th scope='col'>
                                    <a href="{{ route('post.booking',$booking->post->id) }}">予約詳細</a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection