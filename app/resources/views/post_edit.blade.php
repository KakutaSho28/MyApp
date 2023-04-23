@extends('layouts.layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>投稿編集</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                    <div class='panel-body'>
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <form action="{{ route('edit.post',['post' => $post]) }}" method="post">
                        @csrf
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{ old('title',$post['title']) }}"/>
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value="{{ old('date',$post['date']) }}"/>
                                <label for="category" class='mt-2'>世代別カテゴリ</label>
                                    <select name="category" id="category" name="category" value="{{ old('category',$post['category']) }}">
                                        <option hidden>選択してください。</option>
                                        <option value="1" @if(1 == $post['category']) selected @endif>U-12</option>
                                        <option value="2" @if(2 == $post['category']) selected @endif>U-15</option>
                                        <option value="3" @if(3 == $post['category']) selected @endif>U-18</option>
                                        <option value="0" @if(0 == $post['category']) selected @endif>一般</option>
                                    </select>
                                    <br/>
                                <label for='text' class='mt-2'>ワークアウト内容</label>
                                <input type='text' class='form-control' name='workout' id='workout' value="{{ old('workout',$post['workout']) }}"/>
                                <label for='spot' class='mt-2'>開催場所</label>
                                <input type='text' class='form-control' name='spot' id='spot' value="{{ old('spot',$post['spot']) }}"/>
                                <label for='price' class='mt-2'>料金</label>
                                <input type='text' class='form-control' name='price' id='price' value="{{ old('price',$post['price']) }}"/>
                                <label for='text' class='mt-2'>備考</label>
                                <textarea class='form-control' name='text' id='text' value="">{{ old('text',$post->text) }}</textarea>
                                <div class='row justify-content-center'>
                                    <button type='submit' class='btn btn-primary w-25 mt-3' onclick="return confirm('編集しますか？');">編集</button>
                                </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection