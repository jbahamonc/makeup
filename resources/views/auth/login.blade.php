
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
    <div id="container">
        <div id="bg-overlay" class="bg-img" style="background-image: url(https://cdn.hipwallpaper.com/i/85/53/4onKUg.jpg);"></div>        
        <div class="cls-content text-center">
		    <div class="cls-content-sm panel" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23) !important;">
		        <div class="panel-body">
		            <div class="mar-ver pad-btm">
		                <h1 class="h3">Cuenta de Ingreso</h1>
		                <p>Inicia sesión para acceder al panel</p>
		            </div>
		            <form method="POST" action="{{ route('login') }}">
                        @csrf
		                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Username">                            
                            @if ($errors->has('email'))
                                <small class="help-block control-label">{{ $errors->first('email') }}</small>
                            @endif
		                </div>
		                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus placeholder="Password">                            
                            @if ($errors->has('password'))
                                <small class="help-block control-label">{{ $errors->first('password') }}</small>
                            @endif
		                </div>
		                <button class="btn btn-primary btn-lg btn-block" type="submit">Iniciar Sesión</button>
		            </form>
		        </div>		
		        <div class="pad-all">
		            <a href="{{ route('register') }}" class="btn-link mar-lft text-muted">Crear nueva cuenta</a>	            
		        </div>
		    </div>
		</div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/nifty.min.js') }}"></script>
</body>
</html>



