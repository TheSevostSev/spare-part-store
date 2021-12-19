@extends('layouts.main')
@section('content')
<div class="container">
    <ul>
        <a href="/createcar"><li>Добавить машину</li></a>
        <a href="/createmodel"><li>Добавить запчасть</li></a>
    </ul><br>
    <form method="POST" action="/createmodel">
        @csrf
        <label for="name">Название:</label>
        <p><input type="text" name="name"></p>
        <label for="amount">Авто:</label>
        <p>
            <select name="auto">
            <option disabled>Выберите машину</option>
            @foreach($autos as $auto)
                <option value="{{$auto->id}}">{{$auto->name}}</option>
            @endforeach
            </select>
        </p>
        <button type="submit">Добавить новую модель</button>
    </form>
</div>
@endsection