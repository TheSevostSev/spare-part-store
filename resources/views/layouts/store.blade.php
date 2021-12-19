@extends('layouts.main')

@section('content')
@if(session('status')=="Buy!")
        <div class="notification is-success is-light">
        <button class="delete"></button>
        <strong>Спасибо за покупку!</strong>
        </div>
@endif
@if(session('status')=="NotFound")
        <div class="notification is-danger is-light">
        <button class="delete"></button>
        <strong>На данный момент в нашем магазине нет этого товара. Мы вам предлагаем посмотреть другие, возможно они тоже подойдут. </strong>
        <a href="/contacts"> Связь с менеджером</a>
        </div>
@endif
@if(session('status')=="Give")
        <div class="notification is-success is-light">
        <button class="delete"></button>
        <strong>Заказ выдан</strong>
        </div>
@endif
@if(session('status')=="Created")
        <div class="notification is-success is-light">
        <button class="delete"></button>
        <strong>Объект успешно создан!</strong>
        </div>
@endif
<div class="container">
    <p class="title is-2">Уцененные товары:</p>
    <div class="container is-flex is-flex-wrap-wrap is-justify-content-space-between">
        @foreach($priced_parts as $part)
        @include('store._info')
        @endforeach
    </div>
    <p class="title is-2">Новые товары:</p>
    <div class="container is-flex is-flex-wrap-wrap is-justify-content-space-between">
        @foreach($new_parts as $part)
        @include('store._info')
        @endforeach
    </div>
    <p class="title is-2">Популярные товары:</p>
    <div class="is-flex is-flex-wrap-wrap is-justify-content-space-between">
        @foreach($popular_parts as $part)
        @include('store._info')
        @endforeach
    </div>
    <p class="title is-2">Все товары:</p>
    <div class="is-flex is-flex-wrap-wrap is-justify-content-space-between">
        @foreach($all_parts as $part)
        @include('store._info')
        @endforeach
    </div>
</div>
@endsection