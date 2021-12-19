@extends('layouts.show')   

@section('navigation')
@cannot('add')
    <form action="/pay/{{$part->id}}" method="POST">
        @csrf
        <label for="amount">Количество для покупки:</label>
        <p><input type="text" id="amount" name="amount" value="1"></p>
        <button class="button is-success">Купить!</button>
    </form>
@endcan
@can('add')
    <form action="/edit/{{$part->id}}" method="POST">
    @csrf
        <button class="button is-success">Изменить!</button>
    </form>
    <form action="/delete/{{$part->id}}" method="POST">
    @csrf
        <button class="button is-success">Удалить!</button>
    </form>
    <form action="/add/{{$part->id}}" method="GET">
        <button class="button is-success">Добавить!</button>
    </form>
@endcan
@endsection