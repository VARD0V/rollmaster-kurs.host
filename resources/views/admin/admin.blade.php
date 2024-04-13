@extends('layouts.layout-admin')
@section('title', 'Admin-Panel')

@section('content')
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center">
            <h1 style="padding: 10px; border: #FFF500 3px solid"><a href="/admin/products">Продукты</a></h1>
            <h1 style="padding: 10px; border: #FFF500 3px solid"><a href="/admin/categories">Категории</a></h1>
            <h1 style="padding: 10px; border: #FFF500 3px solid"><a>Заказы</a></h1>
    </div>
@endsection
