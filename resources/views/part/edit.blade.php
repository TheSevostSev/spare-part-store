@extends('layouts.main')
@section('content')
<div class="container">
    <form action="/edit/{{$part->id}}" method="POST">
        @method('PUT')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="name">Название:</label>
        <p><input type="text" id="name" name="name" value="{{$part->name}}"></p>
        <label for="number">Номер:</label>
        <p><input type="text" id="number" name="number" value="{{$part->number}}"></p>
        <label for="description">Описание:</label>
        <p><input type="textarea" id="description" name="description" value="{{$part->description}}"></p>
        <label for="amount">Кол-во:</label>
        <p><input type="text" id="amount" name="amount" value="{{$part->amount}}"></p>
        <label for="picture">Картинка:</label>
        <p><input type="text" id="picture" name="picture" value="{{$part->url}}"></p>
        <label for="price">Цена:</label>
        <p><input type="text" id="price" name="price" value="{{$part->price}}"></p>
        <label for="car">Авто:</label>
        <p>
            <select name="auto">
            @foreach($autos as $auto)
                <option value="{{$auto->id}}">{{$auto->name}}</option>
            @endforeach
            </select>
        </p>
        <label for="amount">Модель:</label>
        <p>
            <select name="model">
            @foreach($models as $model)
                <option value="{{$model->id}}">{{$model->name}}</option>
            @endforeach
            </select>
        </p>
        <button type="submit">Изменить запчасть!</button><br>
    </form>
</div>
@endsection