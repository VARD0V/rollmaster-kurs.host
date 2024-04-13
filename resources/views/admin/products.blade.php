@extends('layouts.layout-admin')
@section('title', 'Admin-Panel')

@section('content')
        <h1>Продукты |<a href="{{ route('product.create') }}" style="cursor: pointer"> добавить</a></h1>

        <div class="product-list">
            @if($products->isEmpty())
                <h2>База пуста - создайте товар</h2>
            @else
            @foreach ($products as $product)
                <div class="product-item">
                    <p>ID: {{ $product->id }}</p>
                    <p>Название: {{ $product->name }} |</p>
                    <a class="edit-a" href="/products/update/{{ $product->id }}">Изменить</a>
                    <a class="delete-a" href="/products/destroy/{{ $product->id }}">Удалить</a>
                </div>
            @endforeach
            @endif
        </div>
@endsection

<style>
    .product-list{
        margin: auto 0;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 0;
        grid-row-gap: 0;
    }
    .product-item{
        margin: 5px;
        padding: 5px;
        display: flex;
        align-items: center;
        gap: 10px;
        border: grey solid 2px;
        border-radius: 8px;
    }
    .delete-a:hover{
        color: red;
        cursor: pointer;
    }
    .edit-a:hover{
        color: orange;
        cursor: pointer;
    }
</style>
