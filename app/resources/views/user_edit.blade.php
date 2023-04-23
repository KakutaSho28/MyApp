@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">アカウント変更</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('user.edit',$user['id']) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="d-flex">
                @if($user['img'] == "")
                    <img id="in_img" class="mx-5" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" src="{{ asset('none_img_boy.jpg') }}">
                    <input type="file" id="img" name="img" file="{{ old('img',$user['img']) }}">
                @else
                    <img id="in_img" class="mx-5" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" src="{{ asset('storage/img/'.$user['img']) }}">
                    <input type="file" id="img" name="img" file="{{ old('img',$user['img']) }}">
                @endif
              </div>
              <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$user['name']) }}" />
              </div>
              <div class="form-group">
                <label for="kana">ふりがな</label>
                <input type="text" class="form-control" id="kana" name="kana" value="{{ old('kana',$user['kana']) }}" />
              </div>
              <div class="form-group">
                <label for="category">世代別カテゴリ</label>
                <select name="category" id="category" name="category" value="{{ old('category',$user['category']) }}">
                    <option hidden>選択してください。</option>
                    <option value="1" @if(1 == $user['category']) selected @endif>U-12</option>
                    <option value="2" @if(2 == $user['category']) selected @endif>U-15</option>
                    <option value="3" @if(3 == $user['category']) selected @endif>U-18</option>
                    <option value="0" @if(0 == $user['category']) selected @endif>一般</option>
                </select>
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$user['email']) }}" />
              </div>
              <div class="form-group">
                <label for="tel">電話番号</label>
                <input type="tel"  pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" class="form-control" id="tel" name="tel" value="{{ old('tel',$user['tel']) }}" />
              </div>
              <div class="text-center">
                <button type="submit" class="btn">編集</button>
              </div>
            </div>
            </form>
            <div class="text-right mx-2">
                  <a class="user-del" href="route('softdel.user',Auth::id())" onclick="return confirm('本当に削除しますか？');">
                      アカウント削除
                  </a>
              </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection

