@extends('layouts.show')   

@section('navigation')
@can('add')
    <form action="/add/{{$part->id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="amount">Количество для добавления:</label>
        <p><input type="text" id="amount" name="amount" value="0"></p>
        <button type="submit">Добавить</button>
    </form>
@endcan
@endsection