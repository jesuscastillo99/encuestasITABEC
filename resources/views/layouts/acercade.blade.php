@extends('layouts.landingsinslider')
@section('title', 'Noticias')
@section('content')
 <!-- section -->
 <div class="section margin-top_50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 layout_padding_2">
                <div class="full">
                    <div class="heading_main text_align_left">
                        <h2>Bienvenido a <span>ACERCA DE</span></h2>
                     </div>
                     <div class="full">
                       <p>En esta sección se mostrarán la información del instituto.</p>
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
<!-- end section -->
@endsection