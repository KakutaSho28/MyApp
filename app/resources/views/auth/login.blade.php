@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="concept-title m-auto">
    <p class="concept-left">個人練習をもっとしたい...</p>
        <p class="concept-right">シュート成功率を上げたい...</p>
        <div class="concept">そんなあなたに寄り添い、サポートします！</div>
    </div>
    <div class="row justify-content-around mt-5 mb-5">
        <div class="col-md-4 mt-2">
            <div class="profile">
                <h3 class="text-center">管理人プロフィール</h3>
                <h4 class="text-center">角田　翔</h4>
                <p class="text-center">
                    2001年4月28日(21歳)　青森県南津軽郡藤崎町出身<br>
                    ・全国ミニ2013出場<br>
                    ・青森県選抜、全中2016ベスト16<br>
                    ・高校総体県ベスト8<br>
                </p>
            </div>
            <img class="mt-3" style="width: 100%; border-radius: 50%;" src="{{ asset('shoot.jpg') }}" alt="">
        </div>
        <div class="col-md-8 mt-5">
            <div class="card">
            <div class="card-header">
                <img style="width: 100%;" src="{{ asset('app_title.jpg') }}" alt="">
            </div>
                <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="form-group row">
                            <label class="_aa48 _aa49">
                                <span class="_aa4a">メールアドレス</span>
                                <input aria-required="true" autocapitalize="off" autocorrect="off" maxlength="75" name="email" type="email" class="_aa4b _add6 _ac4d" value="{{ old('email') }}" autofocus>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="_aa48 _aa49">
                                <span class="_aa4a">パスワード</span>
                                <input aria-required="true" autocapitalize="off" autocorrect="off" maxlength="75" name="password" type="password" class="_aa4b _add6 _ac4d">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-login">
                                    {{ __('ログイン') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col text-center">
                                @if (Route::has('password.request'))
                                <p class="pr">
                                <a href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れた方はこちら') }}
                                    </a>
                                </p>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="create-user"><a href="{{ route('register') }}">{{ __('会員登録はこちら') }}</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
