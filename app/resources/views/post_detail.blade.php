@extends('layouts.layout')
@section('content')
    <div class="row justify-content-center">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <tbody>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@if(Auth::user()->role == 1)
<div class='row justify-content-center'>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('home') }}">
            <button class='btn'>戻る</button>
        </a>
    </div>
    <div class='d-flex mx-3 my-3'>
        @if(!isset($post->booking)) 
        <a href="{{ route('booking.post',$post['id']) }}" onclick="return confirm('予約しますか？');">
            <button class='btn'>予約する</button>
        </a>
        @endif
    </div>
    <div class='d-flex mx-3 my-3'>
        @if(isset($post->booking)) 
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
    <form action="{{route('create.destroy',['create' => $post['id']])}}" method="post">
            @csrf
            @method('delete')
            <button class='btn' onclick="return confirm('本当に削除しますか？');">投稿削除</button>
        </form>
    </div>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('create.edit',['create' => $post['id']])}}"  >
            <button class='btn'>投稿編集</button>
        </a>
    </div>
</div>
@endif
@endsection