@extends('layouts.layout-admin')

@section('title', 'Create Product Page')

@section('content')
                    <h1 style="text-align: center">Новый продукт</h1>

                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form" method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="div">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>

                                <label for="price">Цена</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required>

                                <label for="amount">Количество</label>
                                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>

                                <label for="gram">Вес(г)</label>
                                <input type="text" class="form-control" id="gram" name="gram" value="{{ old('gram') }}" required>

                                <label for="photo">Фото</label>
                                <input type="file" id="photo" name="photo">
                            </div>
                            <div class="div">
                                <label for="description">Описание</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            </div>

                            <div class="div">
                                <label for="category_id">Категория</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    <option value="">Выберите категорию</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <button style="margin-top: 10px" type="submit">Добавить</button>

                            </div>
                        </form>
                    </div>
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
        margin: 20px;
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
