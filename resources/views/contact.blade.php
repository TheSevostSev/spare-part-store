@extends('layouts.main')

@section('content')
<form action="/contacts" method="POST" class="container">
@csrf
    <div class="field">
    <label class="label">Заголовок</label>
    <div class="control">
        <div class="select">
        <select name="subject">
            <option>Отличный сервис</option>
            <option>Нет необходимого продукта</option>
            <option>Плохой сервис</option>
        </select>
        </div>
    </div>
    </div>

    <div class="field">
    <label class="label">Сообщение</label>
    <div class="control">
        <textarea class="textarea" placeholder="Textarea" name="text"></textarea>
    </div>
    </div>

    <div class="field is-grouped">
    <div class="control">
        <button class="button is-link">Отправить!</button>
    </div>
    </div>
</form>
@endsection