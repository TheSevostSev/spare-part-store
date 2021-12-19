@extends('layouts.main')

@section('content')
  <section class="section">
      <div class="container ">
      <h1 class="title is-size-6">Автозапчасть</h1>
      @foreach($part->model as $model)
        <h1 class="subtitle is-size-6">{{ $part->name }} {{$model->auto->name}}  {{$model->name}}</h1>
      @endforeach
      <h1 class="subtitle is-size-6">Уникальный идентификатор: {{$part->number }}</h1>
      <figure class="image is-128x128">
          <img src="{{ $part->url }}">
      </figure>
      <p>Описание: {{$part->description}}</p>
      <p>Цена: {{$part->price}}$</p>
      <p>Кол-во на складе: {{$part->amount}} штук</p>
      <div class="buttons are-small">
        @yield('navigation')
      </div>
  </div>
      </section>
@endsection