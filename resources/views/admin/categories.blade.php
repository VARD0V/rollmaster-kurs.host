@extends('layouts.layout-admin')
@section('title', 'Admin-Panel')

@section('content')
    <h1>Категории |<a href="{{ route('category.create') }}" style="cursor: pointer"> добавить</a></h1>
    <div class="category-list">
        @if($categories->isEmpty())
            <h2>База пуста - создайте категорию</h2>
        @else
        @foreach ($categories as $category)
            <div class="category-item">
                <p>ID: {{ $category->id }}</p>
                <p>Название: {{ $category->name }} |</p>
                <a href="/categories/update/{{ $category->id }}" class="edit-a">Изменить</a>
                <a href="/categories/destroy/{{ $category->id }}" class="delete-a">Удалить</a>
            </div>
        @endforeach
        @endif
    </div>
@endsection

<style>
    .category-list{
        margin: auto 0;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 0;
        grid-row-gap: 0;
    }
    .category-item{
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
