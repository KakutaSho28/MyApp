@extends('layouts.layout')
@section('content')
<div class="row justify-content-center">
        <div class="card mt-3">
            <div class="card-header">
            @if(Auth::user()->role == 1 )<div class='text-center'>マイページ</div>@endif
            @if(Auth::user()->role == 0 )<div class='text-center'>ユーザー詳細</div>@endif
            </div>
            <div class="text-center">
                @if($user['img'] == "")
                    <img class="mt-5" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" src="{{ asset('none_img_boy.jpg') }}">
                @else
                    <img class="mt-5" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" src="{{ asset('storage/img/'.$user['img']) }}">
                @endif
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>名前</th>
                                <th scope='col'>{{ $user['name'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>ふりがな</th>
                                <th scope='col'>{{ $user['kana'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>メール</th>
                                <th scope='col'>{{ $user['email'] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>カテゴリ</th>
                                <th scope='col'>{{ config('const')[$user['category']] }}</th>
                            </tr>
                            <tr>
                                <th scope='col'>電話番号</th>
                                <th scope='col'>{{ $user['tel'] }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</div>
<div class='d-flex justify-content-center'>
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('home',Auth::id()) }} ">
            <button class='btn'>戻る</button>
        </a>
    </div>
    @if(Auth::user()->role == 0)
    <div class='d-flex mx-3 my-3'>
        <a href="route('delete.user',$user['id']) ">
            <button class='btn'>削除</button>
        </a>
    </div>
    @endif
    @if(Auth::user()->role == 1 )
    <div class='d-flex mx-3 my-3'>
        <a href="{{ route('user.edit',$user['id']) }}">
            <button class='btn'>アカウント編集</button>
        </a>
    </div>
    @endif
</div>
@endsection