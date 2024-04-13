@extends('layouts.layout-auth')

@section('title', 'Register')

@section('content')

        <h1 style="text-align: center; text-transform: uppercase">Регистрация</h1>
        <form  style="display: flex; align-items: center;flex-direction: column" action="{{ route('register') }}" method="POST" action="">
            @csrf
            <div style="margin-bottom: 10px">
                <label for="name">Имя:</label><br>
                <input PLACEHOLDER="Имя" type="text" id="name" name="name" value="{{ old('name') }}"><br>
            </div>
            <div style="margin-bottom: 10px">
                <label for="login">Логин:</label><br>
                <input PLACEHOLDER="Логин" type="text" id="login" name="login" value="{{ old('login') }}"><br>
            </div>
            <div style="margin-bottom: 10px">
                <label for="password">Пароль:</label><br>
                <input PLACEHOLDER="Пароль" type="password" id="password" name="password" value="{{ old('password') }}"><br>
            </div>
            <div style="margin-bottom: 10px">
                <label for="email">Почта:</label><br>
                <input PLACEHOLDER="Почта" type="email" id="email" name="email" value="{{ old('email') }}"><br>
            </div>
            <div style="margin-bottom: 10px">
                <label for="number">Номер телефона:</label><br>
                <input PLACEHOLDER="Номер телефона" type="text" id="number" name="number" value="{{ old('number') }}"><br>
            </div>
            <button style="margin-top: 10px" type="submit">Регистрация</button>
        </form>
        <a style="margin: 10px auto 0 auto; font-weight: bold; text-transform: uppercase" href="{{ route('login') }}">Авторизация</a>
@endsection
<style>
    input {
        margin-top: 7px;
        font-size: 15px;
        padding: 5px 10px;
        outline: none;
        background: black;
        font-weight: bold;
        color: white;
        border: 2px solid #FFF500;
        border-radius: 20px;
        transition: .3s ease;
    }
    label{
        font-weight: bold;
    }
</style>
