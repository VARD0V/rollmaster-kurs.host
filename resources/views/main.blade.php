@extends('layouts.layout')

@section('title', 'Main Page')

@section('content')
    @foreach ($categories as $category)
        <h1>{{ $category->name }}</h1>
        <div class="products">
            @foreach ($products->where('category_id', $category->id) as $product)
                <div class="product-card">
                    <a href="/products/{{ $product->id }}">
                        <div class="img-product-card">
                            <img src="{{ $product->photo }}" alt="{{ $product->name }}">
                        </div>
                    </a>
                    <div>
                        <div class="product-text">
                            <p>{{ $product->name }}</p>
                        </div>
                        <div style="display: flex; align-items: center">
                            <p style="padding: 10px; font-weight: bold; border: #FFF500 3px solid;
                            border-radius: 8px; margin-right: 5px;">{{ $product->price }}р.</p>
                            <button class="button-buy" style="margin-right: 5px">Купить</button>
                            <p style="font-weight: bold">{{ $product->amount }}шт.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
