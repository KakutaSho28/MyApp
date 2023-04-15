@extends('layouts.layout')
@section('content')
<div class="flex-column m-auto">
        <div class="card mt-3">
            <div class="card-header">
                <div class='text-center'>マイページ</div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <!-- ここにログインしているユーザー情報を表示する -->
                        <thead>
                            <tr>
                                <th scope='col'>名前</th>
                                <th scope='col'>ふりがな</th>
                                <th scope='col'>世代別カテゴリ</th>
                                <th scope='col'>メールアドレス</th>
                                <th scope='col'>電話番号</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope='col'>{{ $user['name'] }}</th>
                                    <th scope='col'>{{ $user['kana'] }}</th>
                                    <th scope='col'>{{ config('const')[$user['category']] }}</th>
                                    <th scope='col'>{{ $user['email'] }}</th>
                                    <th scope='col'>{{ $user['tel'] }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<div class='d-flex justify-content-center'>
    <div class='d-flex mx-3 my-3'>
        <a href=" route('sofdel.user',$user['id']) ">
            <button class='btn btn-secondary'>削除</button>
        </a>
    </div>
    <div class='d-flex mx-3 my-3'>
        <a href=" route('edit.user',$user['id']) ">
            <button class='btn btn-secondary'>編集</button>
        </a>
    </div>
</div>
@endsection