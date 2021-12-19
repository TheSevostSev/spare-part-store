<div class="">
    <a href="/reservepart/{{$part->id}}">
        <img src="{{$part->url}}" class="image is-128x128" >
        <p>{{$part->name}}</p>
        <p>{{$part->auto->first()->name}}</p>
        <p>{{$part->model->first()->name}}</p>
        <p>{{$part->price}}$</p>
        @if($part->amount <= 0)
            <p>Нет в наличии</p>
        @endif
    </a>
</div>
