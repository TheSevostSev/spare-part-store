@extends('layouts.main')

@section('content')
<div class="container">
    <label >Поиск по Признакам:</label></br>
</div>
<form method="POST" action="/search/part" class=" field has-addons container">
   @csrf
  <div class="control">
    <select name="part" class= "select is-rounded">
    @foreach ($parts as $part)
        <option value ="{{$part->name}}">{{$part->name}}</option>
    @endforeach
    </select>
    <select name="auto" class= "select is-rounded">
    @foreach ($autos as $auto)
        <option value ="{{$auto->name}}">{{$auto->name}}</option>
    @endforeach
    </select>
    <select name="model" class= "select is-rounded">
    @foreach ($models as $model)
        <option value="{{$model->name}}">{{$model->name}}</option>
    @endforeach
    </select>
  </div>
  <button type="submit" class="button is-info">Искать</button>
</form><br></br>
@can('search')
<div class="container">
    <label >Поиск по заказу:</label></br>
</div>
<div class="container">
<form action="/search/order" method="POST" class=" field has-addons container">
   @csrf
  <div class="control">
    <input class="input" type="text" placeholder="Введите идентификатор запчасти" name="order_id" >
  </div>
  <button type="submit" class="button is-info">Искать</button>
</form>
@else
<div class="container">
    <label >Поиск по Идентификатору:</label></br>
</div>
<form action="/search/number" method="POST" class=" field has-addons container">
   @csrf
  <div class="control">
    <input class="input" type="text" placeholder="Введите идентификатор запчасти" name="number">
  </div>
  <button type="submit" class="button is-info">Искать</button>
</form></br></br>
@endcan
<div class="container">
    <label>Поиск по Названию:</label></br>
</div>
<form action="/search/name" method="POST" class=" field has-addons container">
   @csrf
  <div class="control">
    <input class="input" type="text" placeholder="Введите ключевое слово" name="text">
  </div>
  <button type="submit" class="button is-info">Искать</button>
</form>
@endsection