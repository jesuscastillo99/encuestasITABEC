@extends('layouts.landingsinslider')
@section('title', 'Bitacoras')
@section('content')
<script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
            const bitacorasPorTecnico = @json($bitacorasPorTecnico);

            const data = new google.visualization.DataTable();
            data.addColumn('string', 'Técnico');
            data.addColumn('number', 'Cantidad de Bitacoras');
            data.addColumn({type: 'string', role: 'style'}); // Añadir una columna de estilos

            Object.keys(bitacorasPorTecnico).forEach(function(tecnico) {
                let color = '';
                if (tecnico === 'Jesus') {
                    color = 'color: #0000FF'; // Azul para Jesús
                } else if (tecnico === 'Leonardo') {
                    color = 'color: #FF0000'; // Rojo para Leo
                } else {
                    color = 'color: #808080'; // Gris para otros técnicos
                }
                data.addRow([tecnico, bitacorasPorTecnico[tecnico].total, color]);
            });

            const options = {
                title: 'Cantidad de Bitacoras por Técnico',
                chartArea: {width: '50%'},
                hAxis: {
                    title: 'Cantidad de Bitácoras: {{ $totalBitacoras }}',
                    minValue: 0
                },
                vAxis: {
                    title: 'Técnico'
                },
                legend: 'none' // Ocultar la leyenda por defecto
            };

            const chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);

            // Agregar leyenda personalizada
            const legendDiv = document.getElementById('legend_div');
            legendDiv.innerHTML = `
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <div>
                                <span style="display:inline-block;width:12px;height:12px;background-color:#FF0000;margin-right:0px;"></span> Cantidad de Bitácoras de Leonardo
                            </div>
                            <div>
                                <span style="display:inline-block;width:12px;height:12px;background-color:#0000FF;margin-right:8px;"></span> Cantidad de Bitácoras de Jesus
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
    </script>

<div class="container">
    <h1 class="my-4">Registros de Bitácoras</h1>

    <!-- Botones de ordenación -->
    <div class="mb-3">
        <a href="{{ route('bitacoras', ['order' => 'asc', 'page' => $currentPage]) }}" class="btn btn-primary">Ordenar por Fecha Ascendente</a>
        <a href="{{ route('bitacoras', ['order' => 'desc', 'page' => $currentPage]) }}" class="btn btn-primary">Ordenar por Fecha Descendente</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fecha Solicitud</th>
                <th>Técnico</th>
                <th>Responsable</th>
                <th>Falla</th>
                <th>Archivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bitacoras as $bitacora)
            <tr>
                <td>{{ $bitacora->fechasolicitud }}</td>
                <td>
                    @if($bitacora->idtecnico == 1)
                        JESUS CASTILLO
                    @elseif($bitacora->idtecnico == 2)
                        LEONARDO CORONADO
                    @else
                        Otro nombre o lógica aquí
                    @endif
                </td>
                <td>{{ $bitacora->responsable }}</td>
                <td>{{ $bitacora->falla }}</td>
                <td>
                    @if($bitacora->archivo)
                        <a href="{{ asset('storage/' . $bitacora->archivo) }}" target="_blank">Ver Archivo</a>
                    @else
                        No hay archivo
                    @endif
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        @if ($currentPage > 1)
            <a class="btn btn-primary mx-1" href="{{ route('bitacoras', ['page' => $currentPage - 1, 'order' => $order]) }}">Regresar</a>
        @endif

        @if ($currentPage < $totalPages)
            <a class="btn btn-primary mx-1" href="{{ route('bitacoras', ['page' => $currentPage + 1, 'order' => $order]) }}">Siguiente</a>
        @endif   
    </div>

    <div class="d-flex justify-content-center">
        <div class="full">
            <a class="hvr-radial-out button-theme mb-4" href="{{ route('bitacoras.create') }}">+Nuevo registro</a>
        </div>
    </div>

    <!-- Gráfico -->
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
    <div id="legend_div" style="width: 100%;"></div>
</div>
@endsection