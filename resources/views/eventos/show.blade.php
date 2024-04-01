@extends('layouts.main')

@section('title', $evento->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/eventos/{{ $evento->image }}" class="img-fluid" alt="imagem do evento - {{ $evento->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $evento->title }}</h1>
                <p class="evento-city"><ion-icon name="location-outline"></ion-icon>{{ $evento->city }}</p>
                <p class="eventos-participantes"><ion-icon name="people-outline"></ion-icon>X Participantes</p>
                <p class="dono-evento"><ion-icon name="star-outline"></ion-icon>{{ $donoEvento['name'] }}</p>
                <a href="#" class="btn btn-primary" id="evento-submit">Confirmar Presença</a>
                @if($evento->items)
                <h3>O evento terá:</h3>
                <ul id="items-list">
                    @foreach(json_decode($evento->items) as $item)
                        <li><ion-icon name="play-outline"></ion-icon><span>{{ $item }}</span></li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento:</h3>
                <p class="evento-descricao">{{ $evento->description }}</p>
            </div>
        </div>
    </div>

@endsection