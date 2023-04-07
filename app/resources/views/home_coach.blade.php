@extends('layouts.layout')

@section('content')
<div class="text-center">指導者メインページ</div>

<div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>投稿一覧</div>
                    <div class='row justify-content-around mt-3 mb-3'>
                <input type='text' class='' placeholder='条件検索'>
                <button type='button' class='btn btn-primary'>検索</button>
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
                                        <th scope='col'>
                                            <a href="{{ route('post.detail',['post' => $post['id']]) }}">詳細</a>
                                        </th>
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
                <input type='text' class='' placeholder='条件検索'>
                <button type='button' class='btn btn-primary'>検索</button>

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
                            <!-- ここに投稿内容を表示する -->
                            @foreach($users as $user)
                                    <tr>
                                        <th scope='col'>{{ $user['name'] }}</th>
                                        <th scope='col'>{{ config('const')[$user['category']] }}</th>
                                        <th scope='col'>
                                            <a href="{{ route('user.detail',['user' => $user['id']]) }}">詳細</a>
                                        </th>
                                    </tr>
                                @endforeach
                            <!-- ここに支出を表示する -->
                                    <tr>
                                        <th scope='col'>
                                            <!-- <a href="">#</a> -->
                                                        <!-- {}の中がリンク先、'spend.detail'はweb.phpで定義したname -->
                                                        <!-- [‘id’ => $spend[‘id’]] は、キー(id)がweb.phpで定義した値( {id} )、値が実際に渡したいパラメータ -->
                                        </th>
                                        <!-- <th scope='col'></th> -->
                                        <!-- blade上で変数を表示する際は、 変数 という形で記述を行います。 波かっこはblade.phpは読み込まれる。 -->
                                        <!-- <th scope='col'></th> -->
                                    </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection