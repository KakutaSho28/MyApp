@extends('layouts.layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>新規投稿</h1>
                </div>
                <div class="card-body">
                <h2 class="ml-2" style="font-size: medium;"><span style="color: red;">※</span>は必須項目です。</h2>
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
                        </div>
                        <form action="/create" method="post">
                            @csrf
                            <label for='title'><span style="font-size: small; color: red;">※</span>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{ old('title') }}"/>
                            <label for='date' class='mt-2'><span style="font-size: small; color: red;">※</span>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value="{{ old('date') }}"/>
                                <label for="category" class='mt-2'><span style="font-size: small; color: red;">※</span>世代別カテゴリ</label>
                                    <select id="category" name="category" value="{{ old('category') }}">
                                        <option hidden value="">選択してください。</option>
                                        <option value="1">U-12</option>
                                        <option value="2">U-15</option>
                                        <option value="3">U-18</option>
                                        <option value="0">一般</option>
                                    </select>
                                    <br/>
                                <label for='text' class='mt-2'><span style="font-size: small; color: red;">※</span>ワークアウト内容</label>
                                <input type='text' class='form-control' name='workout' id='workout' value="{{ old('workout') }}"/>
                                <label for='spot' class='mt-2'><span style="font-size: small; color: red;">※</span>開催場所</label>
                                <input type='text' class='form-control' name='spot' id='spot' value="{{ old('spot') }}"/>
                                <label for='price' class='mt-2'><span style="font-size: small; color: red;">※</span>料金</label>
                                <input type='text' class='form-control' name='price' id='price' value="{{ old('price') }}"/>
                                <label for='text' class='mt-2'><span style="font-size: small; color: red;">※</span>備考</label>
                                <textarea class='form-control' name='text' id='text' value="{{ old('text') }}">{{ old('text') }}</textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn w-25 mt-3' onclick="return confirm('この内容で投稿しますか？');">投稿</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection