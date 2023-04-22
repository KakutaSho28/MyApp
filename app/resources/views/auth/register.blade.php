@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">新規登録</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label for="kana">ふりがな</label>
                <input type="text" class="form-control" id="kana" name="kana" value="{{ old('kana') }}" />
              </div>
              <div class="form-group">
                <label for="birthday">生年月日</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}" />
              </div>
              <div class="form-group">
                <label for="category">世代別カテゴリ</label>
                <select name="category" id="category" name="category" value="{{ old('category') }}">
                <option hidden>選択してください。</option>
                <option value="1">U-12</option>
                <option value="2">U-15</option>
                <option value="3">U-18</option>
                <option value="0">一般</option>
                </select>
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="tel">電話番号</label>
                <input type="tel"  pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <div class="text-center">
                <button type="submit" class="btn">{{ __('登録') }}</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection