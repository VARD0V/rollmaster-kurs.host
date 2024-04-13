@extends('layouts.layout')
@section('title', 'CategoryShow' )

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h1 style="margin: 0 auto; border: #FFF500 solid 3px; padding: 7px; border-radius: 6px;">Категория: {{ $category->name }}</h1>
        <div class="products">
            @foreach ($products as $product)
                <div class="product-card">
                    <a href="/products/{{ $product->id }}">
                        <div class="img-product-card">
                            <img src="/{{ $product->photo }}" alt="{{ $product->name }}">
                        </div>
                    </a>
                    <div class="product-text">
                        <p>{{ $product->name }}</p>
                        <p>|</p>
                        <p style="font-weight: bold">{{ $product->amount }}шт.</p>
                    </div>
                    <div style="display: flex;  height: 50px; align-items: center">
                        <p style="padding: 10px; font-weight: bold; border: #FFF500 3px solid;
                         border-radius: 8px; margin-right: 10px">{{ $product->price }}р.</p>
                        <button class="button-buy" style="margin-right: 10px">Купить</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

