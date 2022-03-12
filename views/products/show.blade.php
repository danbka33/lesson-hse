@extends('layouts.app')

@section('title', 'Карточка товара')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <p>Артикул: {{$product->article}}</p>
            <p>Пользователь: {{ $product->user->name }}</p>

            <button class="btn btn-primary">Назад</button>
        </div>
    </div>
@endsection
