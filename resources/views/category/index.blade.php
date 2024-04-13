@extends('layouts.layout')
@section('title', 'Categories Page')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center ">
        <h1 style="margin: 0 auto; border: #FFF500 solid 3px; padding: 7px; border-radius: 6px">Категории</h1>
        @foreach ($categories as $category)
            <div>
                <h3>
                    <a href="{{ route('category.show', $category->id) }}" style="cursor: pointer">{{ $category->name }}</a>
                </h3>
            </div>
        @endforeach
    </div>
@endsection

