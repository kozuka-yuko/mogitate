@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<div class="register">
    <h1 class="title">商品登録</h1>
    <form action="" class="register-product" method="post" enctype="multipart/form-data">
        @csrf
        <p class="list">商品名 <span class="tag">必須</span></p>
        <input type="text" id="name" class="list__inner" placeholder="商品名を入力">
        <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <p class="list">値段 <span class="tag">必須</span></p>
        <input type="text" id="price" class="list__inner" placeholder="値段を入力">
        <div class="form__error">
            @error('price')
            {{ $message }}
            @enderror
        </div>
        <p class="list">商品画像 <span class="tag">必須</span></p>
        <input type="file" name="image" id="image" class="image" value="{{ old('image') }}">
        <div class="form__error">
            @error('image')
            {{ $message }}
            @enderror
        </div>
        <p class="list">季節 <span class="tag">必須</span> <span class="able">複数選択可</span></p>
        <input type="radio" class="season" id="season1" value="春 {{ old('season') == '春' ? 'checked' : '' }} checked">
        <label for="season1" class="season__inner">春</label>
        <input type="radio" class="season" id="season2" value="夏 {{ old('season') == '夏' ? 'checked' : '' }} checked">
        <label for="season2" class="season__inner">夏</label>
        <input type="radio" class="season" id="season3" value="秋 {{ old('season') == '秋' ? 'checked' : '' }} checked">
        <label for="season3" class="season__inner">秋</label>
        <input type="radio" class="season" id="season4" value="冬 {{ old('season') == '冬' ? 'checked' : '' }} checked">
        <label for="season4" class="season__inner">冬</label>
        <div class="form__error">
            @error('season')
            {{ $message }}
            @enderror
        </div>
        <p class="list">商品説明 <span class="tag">必須</span></p>
        <textarea name="description" id="description" class="description__inner" cols="80" rows="8">{{ old('description') }}</textarea>
        <div class="form__error">
            @error('description')
            {{ $message }}
            @enderror
        </div>
        <div class="button">
            <a href="{{ route('index') }}" class="back__btn">戻る</a>
            <button class="register__btn">登録</button>
        </div>
    </form>
</div>
@endsection