@extends('layouts.layout')

@section('content')
<div class="text-center">指導者メインページ</div>

<div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>投稿一覧</div>
                        <div class='row justify-content-around mt-3 mb-3'>
                            <form action="/" method="POST">
                                @csrf
                                <input type='text' name='keyword' class='' placeholder='条件検索'>
                                <input type='hidden' name='type' class='' value='post'>
                                <button type='submit' class='btn btn-primary'>検索</button>
                            </form>
                            <a href=" {{ route('create.post') }} ">
                                <button type='button' class='btn btn-primary'>投稿</button>
                            </a>
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
                                        <th scope='col'><a href="{{ route('post.detail',$post['id']) }}">詳細</a></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class='text-center'>登録ユーザ一覧</div>
                <form action="/" method="POST">
                    @csrf
                    <input type='text' name='keyword' class='' placeholder='条件検索'>
                    <input type='hidden' name='type' class='' value='user'>
                    <button type='submit' class='btn btn-primary'>検索</button>
                </form>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>名前</th>
                                <th scope='col'>年齢別カテゴリ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ここに登録ユーザを表示する -->
                            @foreach($users as $user)
                                    <tr>
                                        <th scope='col'>{{ $user['name'] }}</th>
                                        <th scope='col'>{{ config('const')[$user['category']] }}</th>
                                        <th scope='col'>
                                            <a href="{{ route('user.detail',$user['id']) }}">詳細</a>
                                        </th>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection