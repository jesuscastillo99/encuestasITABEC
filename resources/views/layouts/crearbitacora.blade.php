@extends('layouts.landingsinslider')
@section('title', 'CrearBitacoras')
@section('content')
<div class="container">
    <h1 class="my-4">Subir nueva Bitácora</h1>
    <form action="{{ route('bitacoras.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="numero">Número</label>
            <input type="number" class="form-control" name="numero" id="numero" required>
        </div>

        <div class="form-group">
            <label for="fechasolicitud">Fecha Solicitud</label>
            <input type="date" class="form-control" name="fechasolicitud" id="fechasolicitud" required>
        </div>

        <div class="form-group">
            <label for="fechaentrega">Fecha Entrega</label>
            <input type="date" class="form-control" name="fechaentrega" id="fechaentrega" required>
        </div>

        <div class="form-group">
            <label for="idtecnico">ID Técnico</label>
            <select class="form-control" id="idtecnico" name="idtecnico">
                <option value="seleccione">Seleccione:</option>
                <option value="1">JESUS CASTILLO</option>
                <option value="2">LEONARDO CORONADO</option>
            </select>
        </div>

        <div class="form-group">
            <label for="idequipo">ID Equipo</label>
            <select class="form-control" name="idequipo" id="idequipo" required>
                <option value="">Seleccionar Equipo</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->idequipo }}">{{ $equipo->equipo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="falla">Falla</label>
            <input type="text" class="form-control" name="falla" id="falla" required>
        </div>

        <div class="form-group">
            <label for="causa">Causa</label>
            <input type="text" class="form-control" name="causa" id="causa" required>
        </div>

        <div class="form-group">
            <label for="solucion">Solución</label>
            <input type="text" class="form-control" name="solucion" id="solucion" required>
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <input type="text" class="form-control" name="observaciones" id="observaciones">
        </div>

        <div class="form-group">
            <label for="responsable">Responsable</label>
            <input type="text" class="form-control" name="responsable" id="responsable">
        </div>

        <div class="form-group">
            <label for="archivo">Archivo PDF</label>
            <input type="file" class="form-control" name="archivo" id="archivo" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection