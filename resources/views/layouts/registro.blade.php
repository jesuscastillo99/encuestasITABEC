@extends('layouts.landinglogin')
@section('title', 'Registro')
@section('content')
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="{{ asset('assets/images/logo-itabec.png')}}"
                           alt="logo-itabec" class="img-responsive" id="img-logo">
                           <h2 class="mt-5 mb-5 pb-1 titulo-login">Bienvenido al Registro</h2>
                      </div>
                      
                      <form method="POST" action="{{ route('registro') }}">
                        @csrf
                        <p class="text-center"><strong>Regístrate con tus datos:</strong></p>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="correo">Correo:</label>
                          <input type="email" name="correo" id="correo" value="{{ old('correo') }}" class="form-control"
                            placeholder="" />
                            @error('correo')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="contraseña">Contraseña:</label>
                          <input type="password" name="contraseña" id="contraseña" value="{{ old('contraseña') }}" class="form-control" maxlength="8"
                            placeholder=""/>
                            @error('contraseña')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="fill rounded" type="submit">REGISTRARSE</button>
                            </button>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">¿Ya tienes cuenta?</p>
                          <button class="fill rounded" type="button" onclick="window.location.href='{{ route('login') }}'">Inicia sesión</button>
                        </div>
                        @if(isset($errorMessage))
                          <div class="alert alert-danger">
                              {{ $errorMessage }}
                          </div>
                        @endif
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2 text-center rounded reducir-ancho">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">OBJETIVOS</h4>
                      <p class="small mb-0 text-white" >El organismo tiene como objetivos, sistematizar, integrar y coordinar como única instancia en el estado, 
                        los procesos de asignación de becas, créditos y estímulos educativos, de las diferentes instituciones educativas ya sean públicas y/o privadas, y en todos los tipos y niveles educativos, con la finalidad de mejorar la cobertura, equidad y calidad del Sistema Estatal de Becas
                      </p>
                        <img src="{{ asset('assets/images/telefonos_800.png')}}"
                        alt="img-telefonos800" class="img-fluid rounded mt-5" id="img-tel800">
                        <img src="{{ asset('assets/images/telefonos-070.png')}}"
                        alt="img-telefonos070" class="img-fluid rounded mt-5" id="img-tel070">
                        <img src="{{ asset('assets/images/telefonos-089.png')}}"
                        alt="img-telefonos089" class="img-fluid rounded mt-5" id="img-tel089">
                        <img src="{{ asset('assets/images/telefonos-911.png')}}"
                        alt="img-telefonos911" class="img-fluid rounded mt-5" id="img-tel911">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
