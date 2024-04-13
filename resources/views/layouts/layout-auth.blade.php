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
        <div class="div2">
            <a href="{{ route('main') }}"><img src="/storage/images/logo.png" alt="logo"></a>
        </div>


    </header>
    <nav class="navigation">
        <a  href="{{ route('category.index') }}" style="cursor: pointer">категории</a>
    </nav>
</div>

<div class="content-auth" style="margin: 10px auto; padding: 20px; box-sizing: border-box">
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
