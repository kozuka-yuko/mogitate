@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
<div class="content">
    <p class="product-name">商品一覧 &gt; {{ $product->name }}</p>
    <form name="update-form" action="{{ route('update', $product->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="image">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img__photo">
        </div>
        <div class="detail">
            <p class="name">商品名</p>
            <input class="name__input" type="text" name="name__input" value="{{ $product->name }}">
            <p class="price">値段</p>
            <input type="text" class="price__input" name="price__input" value="{{ $product->price }}">
            <p class="season">季節</p>
            @foreach ($seasons as $season)
            <input type="checkbox" class="seasons" name="seasons[]" value="{{ $season->id }}" {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
            <label for="seasons" class="season__inner">{{ $season->name }}</label>
            @endforeach
        </div>
        <div class="description">
            <p class="description__inner">商品説明</p>
            <textarea name="description" id="description" class="description__inner" cols="80" rows="8">{{ $product->description }}</textarea>
        </div>
        <div class="button">
            <a href="{{ route('index') }}" class="back-btn">戻る</a>
            <button class="update" type="submit">変更を保存</button>
        </div>
    </form>
    <form action="{{ route('delete', $product->id) }}" class="delete-form" method="post">
        @method('DELETE')
        @csrf
        <button class="delete" type="submit" title="削除"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M33 18.3333H31.6667V16.9999C31.6667 15.5279 30.472 14.3333 29 14.3333H19.6667C18.1947 14.3333 17 15.5279 17 16.9999V18.3333H15.6667C14.9307 18.3333 14.3334 18.9306 14.3334 19.6666C14.3334 20.4026 14.9307 20.9999 15.6667 20.9999V31.6666C15.6667 34.6079 18.0587 36.9999 21 36.9999H27.6667C30.608 36.9999 33 34.6079 33 31.6666V20.9999C33.736 20.9999 34.3334 20.4026 34.3334 19.6666C34.3334 18.9306 33.736 18.3333 33 18.3333ZM19.6667 16.9999H29V18.3333H19.6667V16.9999ZM30.3334 31.6666C30.3334 33.1386 29.1387 34.3333 27.6667 34.3333H21C19.528 34.3333 18.3334 33.1386 18.3334 31.6666V20.9999H30.3334V31.6666ZM20.3334 22.9999C19.9667 22.9999 19.6667 23.2999 19.6667 23.6666V31.6666C19.6667 32.0333 19.9667 32.3333 20.3334 32.3333C20.7 32.3333 21 32.0333 21 31.6666V23.6666C21 23.2999 20.7 22.9999 20.3334 22.9999ZM23 22.9999C22.6334 22.9999 22.3334 23.2999 22.3334 23.6666V31.6666C22.3334 32.0333 22.6334 32.3333 23 32.3333C23.3667 32.3333 23.6667 32.0333 23.6667 31.6666V23.6666C23.6667 23.2999 23.3667 22.9999 23 22.9999ZM25.6667 22.9999C25.3 22.9999 25 23.2999 25 23.6666V31.6666C25 32.0333 25.3 32.3333 25.6667 32.3333C26.0334 32.3333 26.3334 32.0333 26.3334 31.6666V23.6666C26.3334 23.2999 26.0334 22.9999 25.6667 22.9999ZM28.3334 22.9999C27.9667 22.9999 27.6667 23.2999 27.6667 23.6666V31.6666C27.6667 32.0333 27.9667 32.3333 28.3334 32.3333C28.7 32.3333 29 32.0333 29 31.6666V23.6666C29 23.2999 28.7 22.9999 28.3334 22.9999Z" fill="#FD0707" />
            </svg>
        </button>
    </form>
</div>
@endsection