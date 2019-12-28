<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel de Administración | MakeUP</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nifty.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nifty-demo-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
</head>
<body class="pace-done">
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <header id="navbar" class="">
            <div id="navbar-container" class="boxed">
                <div class="navbar-header">
                    <a href="" class="navbar-brand">                        
                        <div class="brand-title">
                            <span class="brand-text">MakeUP</span>
                        </div>
                    </a>
                </div>
                <div class="navbar-content">
                  <ul class="nav navbar-top-links">
                      <li id="dropdown-user" class="dropdown">
                          <a class="text-right">
                              <h1 class="page-header text-overflow" style="color:#FFF;">{{ $titulo }}</h1>
                          </a>
                      </li>
                  </ul>
                    <ul class="nav navbar-top-links">
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" class="text-right">
                                <span class="ic-user pull-right">
                                    <i class="demo-pli-unlock"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="boxed">
            <div id="content-container">
                @yield('content')
            </div>
            <nav id="mainnav-container">
                <div id="mainnav">
                    <div id="mainnav-menu-wrap">
                        <ul id="mainnav-menu" class="list-group">
                            <li class="list-header">Menú Principal</li>
                            <li>
                                <a href="/productos">
                                    <i class="demo-pli-home"></i>
                                    <span class="menu-title">Productos</span>
                                </a>
                            </li>
                            <li>
                                <a href="/categorias">
                                    <i class="demo-pli-gear"></i>
                                    <span class="menu-title">
                                        Categorias
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/promociones">
                                    <i class="demo-pli-basket-coins"></i>
                                    <span class="menu-title">
                                        Promociones
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/pedidos">
                                    <i class="demo-pli-file-text-image"></i>
                                    <span class="menu-title">
                                        Pedidos
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/nifty.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}" ></script>
    <script src="{{ asset('js/form-file-upload.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
