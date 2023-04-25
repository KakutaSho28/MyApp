@extends('layouts.layout')

@section('content')
<div class="row justify-content-center">
    <div class="card box">
        <div class="card-header">
            <div class='text-center'><h2 class="card-title mt-3">投稿一覧</h2></div>
                
        </div>
        <div class="card-body">
            <div class='row justify-content-around'>
                <form action="/" method="POST">
                    @csrf
                    <input type='text' name='keyword' class='' placeholder='条件検索'>
                    <input type='hidden' name='type' class='' value='post'>
                    <button type='submit' class='btn btn-search'><i class="bi bi-search"></i></button>
                </form>
                <a href=" {{ route('create.create') }} ">
                    <button type='button' class='btn btn-post'><i class="bi bi-plus-square"></i></button>
                </a>
            </div>
                @foreach($posts as $post)
                <div class="card-body">
                    <table class='table'>
                        <tbody class="detail">
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
                            <tr>
                                <th scope='col'>備考欄</th>
                                <th scope='col'>{{ $post['text'] }}</th>
                            </tr>
                            <tr>
                            <th scope='col'><a class="post_del" href="{{ route('post.detail',$post['id']) }}">...</a></th>
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