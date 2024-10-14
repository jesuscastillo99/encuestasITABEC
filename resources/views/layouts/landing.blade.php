<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="images/png" href="{{ asset('assets/images/escudotam_2023.ico')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" media="all" href="{{ asset('assets/styles.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css')}}" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/pogo-slider.min.css')}}" />
    <!-- Site CSS -->
    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/responsive.css')}}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/custom.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}" />
</head>

<body>
<!-- Start header -->
<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('inicioadmin') }}"><img src="{{ asset('assets/images/logo-itabec.png')}}" class="img-responsive" alt="img_logoitabec"></a>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link active" href="{{ route('inicioadmin') }}">Inicio</a></li>
                    <li><a class="nav-link" href="">Ver evidencias</a></li>
                    <li><a class="nav-link" href="">Publicaciones</a></li>
                    <li><a class="nav-link" href="">Elementos de Control</a></li>
                    <li><a class="nav-link" href="">Notificaciones</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <li class="nav-item logout-button"><a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
                </ul>
            </div>
            
        </div>
    </nav>
</header>
<!-- End header -->
<!-- Start Banner -->
<div class="ulockd-home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="pogoSlider" id="js-main-slider">
                <div class="pogoSlider-slide img-responsive" style="background-image:url({{ asset('assets/images/fondoTam.png')}});">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide_text">
                                    {{-- Aqui va texto en el slider --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pogoSlider-slide img-responsive" style="background-image:url({{ asset('assets/images/fondoTam.png')}});">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide_text">
                                    {{-- Aqui va texto en el slider --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .pogoSlider -->
        </div>
    </div>
</div>
<!-- End Banner -->
@yield('content')
<!-- Start Footer -->
<footer class="footer-box">
    <div class="container">
    
       <div class="row">
       
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div class="footer_blog">
                <div class="full margin-bottom_30">
                   <img src="{{ asset('assets/images/logo-itabec2.png')}}" class="img-responsive" alt="image_logo" />
                 </div>
                 <div class="full white_fonts">
                    <p>INSTITUTO TAMAULIPECO DE BECAS, ESTÍMULOS Y CRÉDITOS EDUCATIVOS </p>
                 </div>
             </div>
          </div>
          
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
               <div class="footer_blog footer_menu white_fonts">
                        <h3>Menú</h3>
                        <ul> 
                          <li><a href="{{ route('inicioadmin') }}">> Inicio</a></li>
                          <li><a href="#">> Ver evidencias</a></li>
                          <li><a href="#">> Publicaciones</a></li>
                          <li><a href="#">> Elementos de control</a></li>
                          <li><a href="#">> Notificaciones</a></li>
                        </ul>
                     </div>
             </div>
             
             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div class="footer_blog full white_fonts">
                         <h3>Notificaciones</h3>
                         <p>Mántente actualizado conociendo las novedades de la página</p>
                         <div class="newsletter_form">
                            <form action="index.html">
                               <input type="email" placeholder="Escribe tu correo" name="#" required />
                               <button>Enviar</button>
                            </form>
                         </div>
                     </div>
                </div>	 
          
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div class="footer_blog full white_fonts">
                         <h3>Contáctanos</h3>
                         <ul class="full">
                           <li><img src="{{ asset('assets/images/ubi.png')}}"><span>Calle De los Pajaritos S/N, Área Pajaritos<br>Cd. Victoria Tamaulipas., C.P. 87087</span></li>
                           <li><img src="{{ asset('assets/images/mail.png')}}"><span>itabec@gmail.com</span></li>
                           <li><img src="{{ asset('assets/images/phone.png')}}"><span>(834) 107 8998</span></li>
                         </ul>
                     </div>
                </div>	 
          
       </div>
    
    </div>
</footer>
<!-- End Footer -->

<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="crp">© Copyrights 2023 Diseñado por Jesús y Leo</p>
            </div>
        </div>
    </div>
</div>

<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
</body>

    <!-- ALL JS FILES -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/form.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script> 
    <script src="{{ asset('assets/js/jquery.pogo-slider.min.js')}}"></script>
    <script src="{{ asset('assets/js/slider-index.js')}}"></script>
    <script src="{{ asset('assets/js/smoothscroll.js')}}"></script>
    <script src="{{ asset('assets/js/isotope.min.js')}}"></script>
    <script src="{{ asset('assets/js/images-loded.min.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</html>