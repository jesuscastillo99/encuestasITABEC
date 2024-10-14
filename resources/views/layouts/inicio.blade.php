@extends('layouts.landing')
@section('title', 'Inicio')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
 <!-- LOADER -->
 <div id="preloader">
    <div class="loader">
        <img src="{{ asset('assets/images/loader.gif')}}" alt="gif_image" />
    </div>
</div>

 <!-- section PUBLICACIONES -->
 <div class="section margin-top_50">
    <h2 class="text-left ml-5 mb-4 display-6 fw-bold">MIS ÚLTIMAS PUBLICACIONES</h2>
    <div class="row justify-content-center"> <!-- Clase añadida para centrar el contenido -->
        @foreach($publicaciones as $publicacion)
            <div class="col-md-6 col-lg-4 mb-4"> <!-- Ajuste de col-md-6 a col-lg-4 para 3 cards en fila en pantallas grandes -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                        <p class="card-text">{{ Str::limit($publicacion->cuerpo, 100) }}</p>
                        <p class="card-text"><small class="text-muted">{{ $publicacion->fechap }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Botón alineado a la izquierda -->
    <div class="col-md-4">
        <div class="full">
            <div class="full text-md-left">
               <a class="hvr-radial-out button-theme" href="{{ route('bitacoras.create') }}">Ver más publicaciones</a>
            </div>
        </div>
    </div>
</div>
<!-- end section -->

<!-- section EVIDENCIAS -->
<div class="section margin-top_50 mb-4">
    <h2 class="text-left ml-5 mb-4 display-6 fw-bold">EVIDENCIAS POR DIRECCIÓN</h2>
    <div class="row justify-content-center"> <!-- Clase añadida para centrar el contenido -->
            <div class="col-md-6 col-lg-4 mb-4"> <!-- Ajuste de col-md-6 a col-lg-4 para 3 cards en fila en pantallas grandes -->
                
            </div>
    </div>
    <!-- Botón alineado a la izquierda -->
    <div class="col-md-4 mb-5">
        <div class="full">
            <div class="full text-md-left">
               <a class="hvr-radial-out button-theme" href="{{ route('bitacoras.create') }}">Elegir dirección</a>
            </div>
        </div>
    </div>
</div>
<!-- end section -->


<section class="centrar-seccion">
    <div class="section margin-top_50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
                           <h2>Bienvenido a <span>ITABEC</span></h2>
                        </div>
                        <div class="full">
                          <p>Sección de relleno próxima a ser editada.</p>
                        </div>
                        <div class="full">
                           
                        </div>
                    </div>
    
                    
    
                </div>
                <div class="col-md-6">
                    <div class="full">
                        <img src="{{ asset('assets/images/chicos_itabec.jpg')}}" class="img-responsive" alt="chicos_itabecimg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</section>

@endsection