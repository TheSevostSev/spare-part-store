@extends('layouts.main')

@section ('content')
<div class="container">
    <a href="/">Вернуться обратно</a>
    <p class="title is-2">Найденные товары:</p>
    <div class="container is-flex is-flex-wrap-wrap is-justify-content-space-between">
        @foreach($parts as $part)
            @include('store._info')
        @endforeach
    </div>
</div>
@endsection