@extends('layouts.layout-admin')

@section('title', 'Create Categoty Page')

@section('content')
                    <h1 style="text-align: center">Новая категория</h1>
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
                        <form class="form" method="POST" action="{{ route('category.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="div">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
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
