@extends('layouts.app')

@section('content')
<div id="page-content">
   <div class="row">
      <div class="col-md-8 table-responsive">
         <div class="panel">
            <div class="panel-body">
               <h3 class="text-main text-normal text-2x mar-no">Informacion de Orden</h3>
               <h5 class="text-uppercase text-muted text-normal" id="numOrden" data-orden="{{ $pedido->id }}">Numero de Orden: {{ $pedido->num_orden }}</h5>
               <hr class="new-section-xs">
               <div class="row mar-top">
                    <div class="col-sm-4">
                        <div class="text-lg">
                           <p class="text-5x text-thin text-main text-center"><i class="demo-pli-calendar-4"></i></p>
                        </div>
                        <p class="text-2x text-bold text-center">{{ date('d M, Y', strtotime($pedido->fecha_pedido)) }}</p>
                        <p class="text-sm text-center">Fecha de Pedido</p>
                    </div>
                    <div class="col-sm-8">
                        <div class="list-group bg-trans mar-no">
                            <a class="list-group-item" href="/users/{{ $pedido->cliente->id }}">
                               <i class="demo-pli-male icon-lg icon-fw"></i> {{ $pedido->cliente->name }}
                            </a>
                            <a class="list-group-item" href="mailto:{{ $pedido->cliente->email }}">
                               <i class="demo-pli-mail icon-lg icon-fw"></i> {{ $pedido->cliente->email }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-right demo-nifty-btn-group">
                   <div class="btn-group">
                      <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                              Cambiar Estado <i class="dropdown-caret"></i>
                          </button>
                          <ul id="changeEstate" class="dropdown-menu dropdown-menu-right" style="">
                              <li><a href="#">Pagado</a></li>
                              <li><a href="#">Cancelado</a></li>
                          </ul>
                      </div>
                   </div>
                </div>
            </div>
         </div>
         <div class="panel">
             <table class="table invoice-summary" style="border-collapse: separate">
                 <thead>
                     <tr>
                         <th class="text-uppercase" style="padding-left: 20px" colspan="2">Productos</th>
                         <th class="min-col text-center text-uppercase">Cant.</th>
                         <th class="min-col text-center text-uppercase">Precio</th>
                         <th class="min-col text-right text-uppercase" style="padding-right: 20px">Total</th>
                     </tr>
                 </thead>
                 <tbody>
                    @php
                       $total = 0;
                    @endphp
                    @if ( sizeof($pedido->productos) > 0 )
                       @foreach ($pedido->productos as $prod)
                          @php
                              $importe = $prod->pivot->cantidad * $prod->precio_normal;
                              $total += $importe;
                          @endphp
                           <tr>
                               <td width="80" style="padding-left: 20px">
                                  <img src="{{ asset('storage/'.$prod->imagenes[0]->url) }}" alt="Imagen de Producto" class="img-md">
                               </td>
                               <td>
                                  <a class="text-info" href="/productos/editar/{{ $prod->codigo }}">{{ $prod->nombre }}</a>
                               </td>
                               <td class="text-center">{{ $prod->pivot->cantidad }}</td>
                               <td class="text-center">$ {{ number_format($prod->precio_normal, 0) }}</td>
                               <td class="text-right" style="padding-right: 20px">$ {{ number_format($importe, 0) }}</td>
                           </tr>
                        @endforeach
                     @else
                        <tr>
                           <td colspan="5" class="text-center">No hay productos cargados</td>
                        </tr>
                     @endif
                 </tbody>
             </table>
             <div class="clearfix">
   	            <table class="table invoice-total">
   	                <tbody>
   	                    <tr>
   	                        <td class="text-2x text-main">Total</td>
   	                        <td class="text-2x text-main" style="padding-right: 20px">$ {{ number_format($total, 0) }}</td>
   	                    </tr>
   	                </tbody>
   	            </table>
   	        </div>
         </div>
      </div>
      <div class="col-md-4">
         <div id="panelEstado" class="panel media pad-all {{ $pedido->estadoPago->clase_css }}">
             <div class="media-left">
                 <span class="icon-wra icon-wap-sm bg-ifo">
                    <i class="{{ $pedido->estadoPago->icono }} icon-3x"></i>
                 </span>
             </div>
             <div class="media-body">
                 <p class="mar-no">Estado de Orden</p>
                 <p id="nombreEstado" class="text-2x mar-no text-semibold">{{ $pedido->estadoPago->estado }}</p>
             </div>
         </div>
          <div class="panel">
             <div class="widget-header bg-purple">
               <img class="widget-bg img-responsive" src="{{ asset('image/map.jpg') }}" alt="Image">
            </div>
            <div class="panel-heading">
                <div class="panel-control">
                    <button class="btn btn-default" data-panel="fullscreen">
                        <i class="icon-max demo-psi-maximize-3"></i>
                        <i class="icon-min demo-psi-minimize-3"></i>
                    </button>
                </div>
                <h3 class="panel-title">Direccion de Envio</h3>
            </div>
            <div class="panel-body">
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Nombre</p>
                    {{ $pedido->cliente->name }}
                </div>
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Direccion</p>
                    {{ $pedido->cliente->datos_envio->direccion }}
                </div>
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Correo</p>
                    {{ $pedido->cliente->email }}
                </div>
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Telefono</p>
                    {{ $pedido->cliente->datos_envio->telefono }}
                </div>
            </div>
        </div>
        <div class="panel media middle pad-all">
             <div class="media-left">
                 <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                    <i class="demo-pli-wallet-2 icon-2x"></i>
                 </span>
             </div>
             <div class="media-body">
                <p class="text-muted mar-no">Metodo de Pago</p>
                 <p class="text-2x mar-no text-semibold text-main">PayU</p>
             </div>
         </div>
      </div>
   </div>
</div>
@endsection
