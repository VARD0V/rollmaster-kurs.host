@extends('layouts.layout-admin')
@section('title', 'Update-Category')

@section('title', 'Изменение категории')

@section('content')
    <h1 style="text-align: center">Изменение категории</h1>

    <form class="form" action="{{ route('category.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="div">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $categories->name }}" required>
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
        margin: 20px;
        text-align: center;
        align-items: center;
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
</style>
