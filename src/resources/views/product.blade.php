@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}" />
@endsection

@section('content')
<div class="title">
    <h2 class="title__inner">商品一覧</h2>
    <a href="{{ route('register') }}" class="add__button">+商品を追加</a>
</div>
<div class="search">
    <form action="{{ route('search') }}" class="search-form" method="get">
        @csrf
        <input type="text" class="fruit-name" name="name_input" placeholder="商品名で検索" value="{{ old('name_input') }}">
        <button class="search__button" type="submit">検索</button>
        <h3>価格順で表示</h3>
        <select name="price" id="price" class="sort-by-price">
            <option value="">選択してください</option>
            <option value="asc">安い順</option>
            <option value="desc">高い順</option>
        </select>
    </form>
</div>
<div class="product">
    @foreach ($products as $product)
    <div class="product__inner">
        <div class="img">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img__photo">
        </div>
        <div class="info">
            <p class="fruit-name">{{ $product->name }}</p>
            <p class="price">￥{{ $product->price }}</p>
        </div>
    </div>
    @endforeach
    
</div>
@endsection