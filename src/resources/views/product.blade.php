@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="title">
    <h2 class="title__inner">商品一覧</h2>
    <a href="" class="add__button">+商品を追加</a>
</div>
<div class="search">
    <input type="text" class="fruit-name" placeholder="商品名で検索">
    <button class="search__button">検索</button>
    <h3>価格順で表示</h3>
    <select name="price" id="price" class="sort-by-price">
        <option value="">高い順</option>
    </select>
</div>
<div class="product">
    <div class="product__inner">
        <div class="img">
            <img src="" alt="イメージ写真" class="img__photo">
        </div>
        <div class="info">
            <p class="fruit-name">マスカット</p>
            <p class="price">￥1000</p>
        </div>
    </div>
</div>
@endsection