@extends('layouts.landinglogin')
@section('title', 'Login')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
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
                        <h2 class="mt-5 mb-5 pb-1 titulo-login">Bienvenido al Sistema de Encuestas</h2>
                      </div>
                      
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p class="text-center"><strong>Por favor regístrate con tus datos:</strong></p>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="curp">CURP:</label>
                          <input type="text" name="curp" id="curp" value="{{ old('curp') }}" class="form-control" required minlength="18"
                            placeholder="" />
                            @error('curp')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="programa">Seleccione el programa:</label>
                          <select class="form-control" id="programa" name="programa" required>
                            <option value="1">AVANZA</option>
                            <option value="2" >FUTURO</option>
                            <option value="3" >ESPERANZA</option>
                          </select>
                          
                        </div>

                        <div class="text-center pt-1 mb-2 pb-1">
                          <button class="fill rounded mt-2" type="submit">COMPLETAR REGISTRO</button>                  
                        </div>
                        
      
                      </form>
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2 text-center">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">CONÓCENOS</h4>
                      <p class="small mb-0 text-white">El Instituto Tamaulipeco de Becas, Estímulos y Créditos Educativo (ITABEC) 
                        es un organismo público descentralizado con personalidad jurídica y patrimonio propio, adscrito sectorialmente a la Secretaría de Educación.
                      </p>
                        <img src="{{ asset('assets/images/conocenos.png')}}"
                        alt="img-conocenos" class="img-fluid rounded mt-5" id="img-conocenos">
                        <img src="{{ asset('assets/images/conocenos2.png')}}"
                        alt="img-conocenos" class="img-fluid rounded mt-5" id="img-conocenos">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
