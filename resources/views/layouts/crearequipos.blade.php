@extends('layouts.landingsinslider')
@section('title', 'Equipos')
@section('content')
<div class="container">
    <h1 class="my-4">Subir nuevo equipo</h1>
    <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="equipo">Equipo</label>
            <input type="text" class="form-control" name="equipo" id="equipo" required>
        </div>

        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" name="modelo" id="modelo" required>
        </div>

        <div class="form-group">
            <label for="sistema">Sistema</label>
            <input type="text" class="form-control" name="sistema" id="sistema" required>
        </div>

        <div class="form-group">
            <label for="procesador">Procesador</label>
            <input type="text" class="form-control" name="procesador" id="procesador" required>
        </div>

        <div class="form-group">
            <label for="ram">Memoria Ram</label>
            <input type="text" class="form-control" name="ram" id="ram">
        </div>

        <div class="form-group">
            <label for="almacenamiento">Almacenamiento</label>
            <input type="text" class="form-control" name="almacenamiento" id="almacenamiento">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection