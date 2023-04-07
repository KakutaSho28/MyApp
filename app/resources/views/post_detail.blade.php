@extends('layouts.layout')
@section('content')
<div class="col-md-4 m-auto">
        <div class="card mt-3">
            <div class="card-header">
                <div class='text-center'>投稿内容</div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>日付</th>
                                <th scope='col'>金額</th>
                                <th scope='col'>カテゴリ</th>
                                <th scope='col'>コメント</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ここに投稿を表示する -->
                                <tr>
                                    <th scope='col'>{{ $posting['title'] }}</th>
                                    <th scope='col'>{{ $pospostingt['date'] }}</th>
                                    <th scope='col'>{{ config('const')[$posting['category']] }}</th>
                                    <th scope='col'>{{ $posting['text'] }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<div class='d-flex justify-content-center'>
    <div class='d-flex mx-3 my-3'>
        <a href="route('delete.post',['post' => $post['id']]) ">
            <button class='btn btn-secondary'>削除</button>
        </a>
    </div>
    <div class='d-flex mx-3 my-3'>
        <a href="route('edit.post',['post' => $post['id']]) ">
            <button class='btn btn-secondary'>編集</button>
        </a>
    </div>
    <div class='d-flex mx-3 my-3'>
        <a href="route('softdel.post',['post' => $post['id']]) ">
            <button class='btn btn-secondary'>論理削除</button>
        </a>
    </div>
</div>
@endsection