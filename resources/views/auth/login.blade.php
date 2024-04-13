@extends('layouts.layout-auth')

@section('title', 'Login')

@section('content')
    <h1 style="text-align: center; text-transform: uppercase">Авторизация</h1>
    <div>
        <form  style="display: flex; align-items: center;flex-direction: column" action="{{ route('login') }}" method="POST" action="">
            @csrf
            <div style="margin-bottom: 20px">
                <label for="number">Номер телефона:</label><br>
                <input type="text" id="number" name="number" placeholder="Номер телефона"><br>
            </div>
            <div style="margin-bottom: 10px">
                <label for="password">Пароль:</label><br>
                <input type="password" id="password" name="password" placeholder="Пароль"><br>
            </div>
            <button style="margin-top: 10px" type="submit">Авторизация</button>
        </form>
    </div>
    <div style="margin: 10px auto 0 auto;">
        <a style="text-align: center; font-weight: bold; padding: 5px;
        text-transform: uppercase" href="{{ route('register') }}">Регистрация</a>
    </div>
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
