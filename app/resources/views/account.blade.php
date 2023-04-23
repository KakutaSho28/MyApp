@extends('layouts.layout')

@section('content')
<div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <div class='text-center'>登録ユーザ一覧</div>
                
            </div>
            <div class="card-body">
            <form class="text-right" action="/" method="POST">
                    @csrf
                    <input type='text' name='keyword' class='' placeholder='条件検索'>
                    <input type='hidden' name='type' class='' value='user'>
                    <button type='submit' class='btn btn-search'><i class="bi bi-search"></i></button>
                </form>
                <div class="card-body">
                    <table class='table user_list'>
                        <thead>
                            <tr>
                                <th scope='col'></th>
                                <th scope='col'>名前</th>
                                <th scope='col'>年齢別カテゴリ</th>
                                <th scope='col'>電話番号</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ここに登録ユーザを表示する -->
                            @foreach($users as $user)
                                <tr>
                                <th scope='col'>
                                @if( empty($user['img']))
                                    <img style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" src="{{ asset('none_img_boy.jpg') }}"><span class="caret"></span>
                                @else
                                    <img style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" src="{{ asset('storage/img/'.$user['img']) }}"><span class="caret"></span>
                                @endif
                                        </th>
                                        <th scope='col'>{{ $user['name'] }}</th>
                                        <th scope='col'>{{ config('const')[$user['category']] }}</th>
                                        <th scope='col'>{{ $user['tel'] }}</th>
                                        <th scope='col'>
                                            <a class="detail" href="{{ route('user.detail',$user['id']) }}">詳細</a>
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
