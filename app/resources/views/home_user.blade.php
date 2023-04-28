@extends('layouts.layout')

@section('content')
<div class="row justify-content-around">
    <div class="card ml-5 card-list">
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
            @foreach($posts as $post)
            <div class="card-body">
                <table class='table'>
                    <tbody class="detail">
                            <tr>
                                <th scope='col' class="post">タイトル</th>
                                <th scope='col' class="post">{{ $post['title'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col' class="post">開催日時</th>
                                <th scope='col' class="post">{{ $post['date'] }}</th>
                            </tr>
                            <tr>
                            <th scope='col' class="post">世代別カテゴリ</th>
                                <th scope='col' class="post">{{ config('const')[$post['category']] }}</th>
                            </tr>
                            <tr>
                            <th scope='col' class="ml-5">
                            @if (!$post->isLikedBy(Auth::id()))
                                <span class="likes">
                                    <a type="hidden" class="btn-like like-toggle" data-post-id="{{ $post->id }}"><i class="bi bi-heart-fill" style="font-size: 1.5rem;"></i></a>
                                </span><!-- /.likes -->
                            @else
                                <span class="likes">
                                    <a type="hidden" class="btn-like like-toggle liked" data-post-id="{{ $post->id }}"><i class="bi bi-heart-fill" style="font-size: 1.5rem;"></i></a>
                                </span><!-- /.likes -->
                            @endif
                            <a class="ml-3 post_del" href="{{ route('post.booking',$post['id']) }}">...</a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card mr-5 card-list">
        <div class="card-header">
            <div class='text-center'><h2 class="card-title mt-3">予約一覧</h2></div>
        </div>
        <div class="card-body">
            @foreach($bookings as $booking)
                <div class="card-body">
                    <table class='table'>
                        <tbody class='detail'>
                            <!-- ここに登録ユーザを表示する -->
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
                                    <a href="{{ route('post.booking',$booking->post->id) }}">詳細</a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
            </div>
        </div>
</div>
@endsection