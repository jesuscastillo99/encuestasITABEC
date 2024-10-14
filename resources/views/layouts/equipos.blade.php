@extends('layouts.landingsinslider')
@section('title', 'Equipos')
@section('content')
<div class="container">
    <h1 class="my-4">Registros de Equipos</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Modelo</th>
                <th>Sistema</th>
                <th>Procesador</th>
                <th>Ram</th>
                <th>Almacenamiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
            <tr>
                <td>{{ $equipo->equipo }}</td>
                <td>{{ $equipo->modelo }}</td>
                <td>{{ $equipo->sistema }}</td>
                <td>{{ $equipo->procesador }}</td>
                <td>{{ $equipo->ram }}</td>
                <td>{{ $equipo->almacenamiento }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="d-flex justify-content-center">
        <div class="full">
            <a class="hvr-radial-out button-theme mb-4" href="{{ route('equipos.create') }}">+Nuevo equipo</a>
        </div>
    </div>

    
</div>
@endsection