@extends('layouts.layout')

@section('title', 'Product Page')

@section('content')
        <div class="product-details">
            <div  class="img-product-card"  style="border: #FFF500 3px solid; margin: 20px; border-radius: 5px; padding: 5px">
                <img src="/{{ $product->photo }}" alt="{{ $product->name }}">
            </div>
            <div class="product-details-text">
                <h1>{{ $product->name }}</h1>
                <p style="max-width: 300px;">{{ $product->description }}</p>
                <p>Цена: {{ $product->price }}p.</p>
                <p>Количество: {{ $product->amount }}</p>
                <p>Вес: {{ $product->gram }}</p>
                <button type="submit" class="button-buy">Купить</button>
            </div>
        </div>
        <div style="color: white; margin: 60px auto 0 auto ; text-align: center; text-transform: uppercase; font-weight: bold">
            <a href="{{ url()->previous() }}">назад</a>
        </div>
@endsection
<style>
    .product-details{
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
    }
    .product-details-text{
        flex-direction: column;
    }
</style>
