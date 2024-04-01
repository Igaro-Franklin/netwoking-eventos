@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-eventos-container">
        @if(count($eventos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/eventos/{{$evento->id}}">{{ $evento->title }}</a></td>
                        <td>0</td>
                        <td>
                            <a href="#">Editar</a>
                            <a href="#">Excluír</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Você ainda não tem eventos. <a href="/eventos/criar">Crie um agora mesmo</a></p>
        @endif
    </div>

@endsection