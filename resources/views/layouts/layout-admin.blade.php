<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-color: black; color: white">
<div class="head">
    <header>
        <div class="div1">
            @auth <!-- Проверяем, аутентифицирован ли пользователь -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Выход</button>
            </form>
            @else
                @if (!request()->is('login', 'register')) <!-- Проверяем, не находится ли пользователь на странице login или register -->
                <button onclick="location.href='{{ route('login') }}'">login</button>
                @endif
            @endauth
        </div>

        <div class="div2">
            <a href="{{ route('main') }}"><img src="/storage/images/logo.png" alt="logo"></a>
        </div>

    </header>
    <nav class="navigation">
        <a href="{{ route('admin') }}">Панель администратора</a>
    </nav>
</div>

<div class="content" style="margin: 10px auto; padding: 20px; box-sizing: border-box; min-height: 710px">
    @yield('content')
</div>

<footer>
    <div class="description">
        ROLLMASTER - это выгодные суши в городе Томск. Покупая нашу продукцию, Вы покупаете роллы ресторанного качества по низким ценам. Вы получаете ответ на известный вопрос, чтобы такого вкусного покушать.<br>
        Вы приобретаете дополнительное время для себя и своей семьи, которое бесценно и безвозвратно. Долой ожоги и страдания на кухне.
    </div>
</footer>
</body>
</html>

