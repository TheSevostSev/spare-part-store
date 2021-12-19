@extends('layouts.main')
@section('content')
<div class="container">
    <ul>
        <a href="/createcar"><li>Добавить машину</li></a>
        <a href="/createmodel"><li>Добавить модель</li></a>
    </ul><br>
    <form method="POST" action="/createpart">
        @csrf
        <label for="name">Название:</label>
        <p><input type="text" id="name" name="name"></p>
        <label for="number">Номер:</label>
        <p><input type="text" id="number" name="number"></p>
        <label for="description">Описание:</label>
        <p><textarea name="description" id="description" cols="40" rows="5"></textarea></p>
        <label for="amount">Кол-во:</label>
        <p><input type="text" id="amount" name="amount" value="1"></p>
        <label for="amount">Цена:</label>
        <p><input type="text" id="price" name="price" value=""></p>
        <label for="picture">Картинка:</label>
        <p><input type="text" id="picture" name="picture" value=""></p>
        <label for="amount">Авто:</label>
        <p>
            <select name="auto">
            <option disabled>Выберите машину</option>
            @foreach($autos as $auto)
                <option value="{{$auto->id}}">{{$auto->name}}</option>
            @endforeach
            </select>
        </p>
        <label for="amount">Модель:</label>
        <p>
            <select name="model">
            <option disabled>Выберите машину</option>
            @foreach($models as $model)
                <option value="{{$model->id}}">{{$model->name}}</option>
            @endforeach
            </select>
        </p><br>
        <button type="submit">Добавить новую запчасть</button>
    </form>
</div>
@endsection