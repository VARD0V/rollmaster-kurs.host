@extends('layouts.layout-admin')
@section('title', 'Update-Product')

@section('title', 'Изменение продукта')

@section('content')
    <h1  style="text-align: center">Изменение продукта</h1>

    <form class="form" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="div">
            <img src="{{ asset($product->photo) }}" alt="Current Photo">
            <input type="file" id="photo" name="photo">
        </div>
        <div class="div">
            <label for="name">Название</label>
            <input type="text"  id="name" name="name" value="{{ $product->name }}" required>

            <label for="price">Цена</label>
            <input type="number" c id="price" name="price" value="{{ $product->price }}" required>

            <label for="amount">Количество</label>
            <input type="number" id="amount" name="amount" value="{{ $product->amount }}" required>

            <label for="gram">Вес(г)</label>
            <input type="text" id="amount" name="gram" value="{{ $product->gram }}" required>

            <label for="category_id">Категория</label>
            <select style="margin-top: 7px" id="category_id" name="category_id" required>
                <option value="">Выберите категорию</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="div">
            <label for="description">Описание</label>
            <textarea id="description" name="description">{{ $product->description }}</textarea>
            <button style="margin-top: 10px" type="submit">Сохранить изменения</button>

        </div>
    </form>
@endsection
<style>
    .form{
        display: flex;
        justify-content: center;
    }
    .div{
        display: flex;
        flex-direction: column;
        width: 400px;
        margin: 40px;
        text-align: center;
    }
    .div>img{
        max-width: 300px;
        border: #FFF500 2px solid;
        padding: 8px;
        border-radius: 4px;
    }
    input {
        margin-top: 7px;
        font-size: 15px;
        padding: 5px 10px;
        outline: none;
        background: black;
        font-weight: bold;
        color: white;
        border: 2px solid #FFF500;
        border-radius: 4px;
        transition: .3s ease;
    }
    label{
        text-transform: uppercase;
        margin-top: 10px;
        font-weight: bold;
    }
    textarea{
        height: 200px;
        margin-top: 10px;
        background-color: black;
        border: #FFF500 2px solid;
        border-radius: 4px;
        color: white; font-size: medium; font-weight: bold;
        max-width: 400px;
    }
    select{
        height: 31px;
        background-color: black;
        color: white;
        font-weight: bold;
        border: #FFF500 2px solid;
        border-radius: 4px;
    }
</style>
