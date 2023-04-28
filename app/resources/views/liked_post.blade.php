@extends('layouts.layout')

@section('content')
<div class="row justify-content-around">
    <div class="col-md-4 box">
        <div class="card ">
            <div class="card-header">
                <div class='text-center'><h2 class="card-title mt-3">いいねした投稿</h2></div>
            </div>
            <div class="card-body">
            @foreach(Auth::user()->like as $like)
                <div class="card-body">
                    <table class='table'>
                        <tbody>
                            <tr>
                                <th scope='col'>タイトル</th>
                                <th scope='col'>{{ $like->post->title }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>開催日時</th>
                                <th scope='col'>{{ $like->post->date }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>世代別カテゴリ</th>
                                <th scope='col'>{{ config('const')[$like->post->category] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>備考欄</th>
                                <th scope='col'>{{ $like->post->text }}</th>
                            </tr>
                            <tr>
                            </th>
                                <th scope='col'>
                                    <a class="post_del" href="{{ route('post.booking',$like->post_id) }}">...</a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

