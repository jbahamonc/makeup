<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel de Administraciónd e MakeUP</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nifty.min.css') }}" rel="stylesheet">
</head>
<body>
   <div class="container">
      <div id="bg-overlay" class="bg-img" style="background-image: url(/image/bg-login.jpg);"></div>
       <div class="cls-content text-center">
           <div class="cls-content-sm panel" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23) !important;">
               <div class="panel-body">
                  <div class="mar-ver pad-btm">
                     <h1 class="h3">Formulario de Registro</h1>
                     <p>Registrece para poder acceder al panel</p>
                 </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  		                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Username">
                              @if ($errors->has('email'))
                                  <small class="help-block control-label">{{ $errors->first('email') }}</small>
                              @endif
  		                  </div> --}}

                        <div class="form-group">
                           <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre Completo" required autofocus>
                           @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                           @endif
                        </div>
                        <div class="form-group">
                             <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Correo Electronico">
                             @if ($errors->has('email'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                             @endif
                        </div>
                        <div class="form-group">
                             <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
                             @if ($errors->has('password'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                             @endif
                        </div>
                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                        </div>
                        <div class="form-group row mb-0">
                             <button type="submit" class="btn btn-primary btn-lg btn-block">
                                 Registrarse
                             </button>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </div>
</body>
