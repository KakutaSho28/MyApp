@extends('layouts.layout')

@section('content')
<div class="row justify-content-around">
    <div class="row justify-content-around">
        <div class="card m-auto">
            <div class="card-header">
                <div class='text-center'><h2 class="card-title mt-3">投稿一覧</h2></div>
            </div>
            <div class="card-body">
            <div class='row justify-content-around mt-3 mb-3'>
                    <form action="/" method="POST">
                        @csrf
                        <input type='text' name='keyword' class='' placeholder='条件検索'>
                        <input type='hidden' name='type' class='' value='post'>
                        <button type='submit' class='btn'>検索</button>
                    </form>
                </div>
                <div class="card-body">
                    <table class='table'>
                        <tbody class="detail">
                            <!-- ここに投稿内容を表示する -->
                            @foreach($posts as $post)
                                    <tr>
                                        <th scope='col'>タイトル</th>
                                        <th scope='col'>{{ $post['title'] }}</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>開催日時</th>
                                        <th scope='col'>{{ $post['date'] }}</th>
                                    </tr>
                                    <tr>
                                    <th scope='col'>世代別カテゴリ</th>
                                        <th scope='col'>{{ config('const')[$post['category']] }}</th>
                                    </tr>
                                    
                                    <th scope='col'>
                                    @if (!$post->isLikedBy(Auth::id()))
                                        <span class="likes">
                                        <button type="hidden" class="btn-like like-toggle" data-post-id="{{ $post->id }}"><i class="bi bi-heart-fill"></i></button>
                                        </span><!-- /.likes -->
                                    @else
                                        <span class="likes">
                                            <button type="hidden" class="btn-like like-toggle liked" data-post-id="{{ $post->id }}"><i class="bi bi-heart-fill"></i></button>
                                        </span><!-- /.likes -->
                                    @endif
                                    <a class="ml-3" href="{{ route('post.booking',$post['id']) }}">...</a>
                                    </th>
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
                <div class='text-center'><h2 class="card-title mt-3">予約一覧</h2></div>
                
            </div>
            <div class="card-body">
            <div class='row justify-content-around mt-3 mb-3'>
                    <form action="/" method="POST">
                        @csrf
                        <input type='text' name='keyword' class='' placeholder='条件検索' value="{{ old('keyword') }}">
                        <input type='hidden' name='type' class='' value='booking'>
                        <button type='submit' class='btn'>検索</button>
                    </form>
                </div>
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>予約情報</th>
                            </tr>
                        </thead>
                        <tbody class='detail'>
                            <!-- ここに登録ユーザを表示する -->
                            @foreach($bookings as $booking)
                            <tr>
                                <th scope='col'>開催日時</th>
                                <th scope='col'>{{ $booking->post->date }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>ワークアウト内容</th>
                                <th scope='col'>{{ $booking->post->workout }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>開催場所</th>
                                <th scope='col'>{{ $booking->post->spot }}</th>
                            </tr>
                                <th scope='col'>
                                    <a href="{{ route('post.booking',$booking->post->id) }}">...</a>
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