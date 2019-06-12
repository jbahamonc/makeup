@extends('layouts.app')

@section('content')

{{-- <div id="page-head">
    <div class="pad-all">
        <h3>
            Promociones
            <a href="/promociones/crear" id="demo-btn-addrow" class="btn btn-primary pull-right">Crear Promoción</a>
        </h3>
        <p>A continuación encontrara las promociones registradas</p>
    </div>
</div> --}}
<div id="page-content">
    <div class="row pad-btm">
       <div class="col-sm-6 toolbar-right"></div>
       <div class="col-sm-6 toolbar-right text-right">
           <a href="/productos/editar/0" id="demo-btn-addrow" class="btn btn-success btn-lg">Nuevo Producto</a>
       </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th class="min-width">Imagen</th>
                        <th>Promoción</th>
                        <th class="text-center min-width">Descuento</th>
                        <th class="min-width"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <img width="50" src="{{ asset('image/categoria.png') }}" alt="">
                        </td>
                        <td>
                            <span class="text-main">LoreLabore labore duis amet excepteur eu proident deserunt incididunt proident incididunt.</span>
                            <br>
                            <small class="text-muted">21/03/2019 - 30/03/2019</small>
                        </td>
                        <td class="text-center"><span class="text-danger text-semibold">50%</span></td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button class="btn btn-trans dropdown-toggle dropdown-toggle-icon"
                                    data-toggle="dropdown" type="button" aria-expanded="false">
                                    <i class="demo-psi-dot-horizontal icon-lg"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" style="">
                                    <li><a href="#">Eliminar</a></li>
                                    <li><a href="#">Ver detalles</a></li>
                                    <li><a href="#">Ver productos</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
