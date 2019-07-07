@extends('layouts.app')

@section('content')
<div id="page-content">
    <div class="row pad-btm">
       <div class="col-sm-6 toolbar-right"></div>
       <div class="col-sm-6 toolbar-right text-right">
           <a href="/promociones/editar/0" id="demo-btn-addrow" class="btn btn-success btn-lg">Nueva Promoción</a>
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
                   @if (sizeof($promos) > 0 )
                      @foreach ($promos as $pro)
                          <tr>
                              <td class="text-center">
                                  <img width="50" src="{{ asset('storage/'. $pro->imagen) }}" alt="">
                              </td>
                              <td>
                                  <span class="text-main">{{ $pro->nombre }}</span>
                                  <br>
                                  <small class="text-muted">{{ $pro->fecha_inicio . ' - ' . $pro->fecha_fin }}</small>
                              </td>
                              <td class="text-center"><span class="text-danger text-semibold">{{ $pro->descuento }}%</span></td>
                              <td class="text-center">
                                  <div class="btn-group dropdown">
                                      <button class="btn btn-trans dropdown-toggle dropdown-toggle-icon"
                                          data-toggle="dropdown" type="button" aria-expanded="false">
                                          <i class="demo-psi-dot-horizontal icon-lg"></i>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu-right" style="">
                                          <li><a href="#">Eliminar</a></li>
                                          <li><a href="/promociones/editar/{{ $pro->codigo }}">Ver detalles</a></li>
                                          <li><a href="#">Ver productos</a></li>
                                      </ul>
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                   @else
                      <tr>
                         <td colspan="4" class="text-center">No se cargo ninguna promocion</td>
                      </tr>
                   @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
