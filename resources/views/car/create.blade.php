@extends('layouts.main')
@section('content')
<div class="container">
    <ul>
        <a href="/createpart"><li>Добавить запчасть</li></a>
        <a href="/createmodel"><li>Добавить модель</li></a>
    </ul><br>
    <form method="POST" action="/createcar">
        @csrf
        <label for="name">Название:</label>
        <p><input type="text" id="name" name="name"></p>
        <label for="number">Год:</label>
        <p><input type="text" id="year" name="year"></p>
        <label for="picture">Картинка:</label>
        <p><input type="text" id="picture" name="picture" value=""></p>
        <button type="submit">Добавить новую машину</button>
    </form>
</div>
@endsection