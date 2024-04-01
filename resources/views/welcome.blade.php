@extends('layouts.main')

@section('title', 'NetWorking Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="get">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="eventos-container" class="col-md-12">
        @if($search)
        <h2>Buscando por: "{{ $search }}"</h2>
        @else
        <h2>Próximos eventos</h2>
        <p class="subtitulo">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container">
            @foreach($eventos as $evento)
            <div class="card col-md-3">
                <img src="/img/eventos/{{ $evento->image }}" alt="Imagem do evento - {{ $evento->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($evento->date)) }}</p>
                    <h5 class="card-title">{{ $evento->title }}</h5>
                    <p class="card-participantes">X Participantes</p>
                    <a href="/eventos/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
            @endforeach
            @if(count($eventos) === 0 && $search)
                <p>Não Não foi possível encontrar um evento com "{{ $search }}" <a href="/"> Ver todos...</a></p>
            @elseif(count($eventos) === 0)
                <p>Não há eventos programados!</p>
            @endif
        </div>
    </div>

@endsection