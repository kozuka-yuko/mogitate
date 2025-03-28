@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<div class="register">
    <h1 class="title">商品登録</h1>
    <form action="{{ route('store') }}" class="register-product" method="post" enctype="multipart/form-data">
        @csrf
        <p class="list">商品名 <span class="tag">必須</span></p>
        <input type="text" name="name" id="name" class="list__inner" value="{{ old('name') }}" placeholder="商品名を入力">
        <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <p class="list">値段 <span class="tag">必須</span></p>
        <input type="text" name="price" id="price" class="list__inner" value="{{ old('price') }}" placeholder="値段を入力">
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
        @foreach ($seasons as $season)
        <input type="checkbox" class="seasons" name="seasons[]" value="{{ $season->id }}" {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}>
        <label for="seasons" class="season__inner">{{ $season->name }}</label>
        @endforeach
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
            <button class="register__btn" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection