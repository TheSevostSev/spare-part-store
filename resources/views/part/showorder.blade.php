@extends('layouts.show')   

@section('navigation')
@can('add')
    <form action="/give/{{$receipt->id}}" method="POST">
        @csrf
        <button class="button is-danger">Выдать!</button>
    </form>
    <form action="/cancel/{{$receipt->id}}" method="POST">
        @csrf
        <button class="button is-danger">Отменить!</button>
    </form>
@endcan
@endsection