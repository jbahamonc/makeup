@extends('layouts.app')

@section('content')
<div id="page-content">
   <div class="panel">
	    <div class="panel-body">
	        <form class="form-inline form-search">
	            <div class="form-group">
	                <input type="email" placeholder="Enter email" id="demo-inline-inputmail" class="form-control">
	            </div>
               <div class="form-group">
                    <div class="select">
                        <select data-placeholder="Categoria" name="categoria" id="chosen-select" tabindex="-1">
                               <option selected="" value="1">sin categoria</option>
                               <option value="2">Ojos</option>
                         </select>
                    </div>
               </div>
               <div class="form-group">
                    <div class="select">
                        <select data-placeholder="Categoria" name="categoria" id="chosen-select" tabindex="-1">
                               <option selected="" value="1">sin categoria</option>
                               <option value="2">Ojos</option>
                         </select>
                    </div>
               </div>
	        </form>
	    </div>
	</div>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Listado de Pedidos</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                       <th width="120">ID</th>
                        <th width="150">Fecha</th>
                        <th>Cliente</th>
                        <th  width="120" class="text-center">Pago</th>
                        <th  width="150" class="text-center">Despacho</th>
                        <th  width="120" class="text-right">Total</th>
                        <th width="80"></th>
                    </tr>
                </thead>
                <tbody>
                   @if(count($pedidos) > 0)
                      @foreach ($pedidos as $pedido)
                          <tr>
                              <td><a class="text-info" href="/pedidos/{{ $pedido->num_orden }}">{{ $pedido->num_orden }}</a></td>
                              <td>{{ $pedido->fecha_pedido }}</td>
                              <td>{{ $pedido->cliente->name }}</td>
                              <td class="text-center">
                                  <span class="label label-table label-warning">{{ $pedido->estadoPago->estado }}</span>
                              </td>
                              <td class="text-center">
                                  <span class="label label-table label-default">{{ $pedido->estadoEnvio->estado }}</span>
                              </td>
                              <td class="text-right">{{ $pedido->total}}</td>
                              <td class="text-center">
                                  <div class="btn-group dropdown">
                                      <button class="btn btn-trans dropdown-toggle dropdown-toggle-icon"
                                          data-toggle="dropdown" type="button" aria-expanded="false">
                                          <i class="demo-psi-dot-horizontal icon-lg"></i>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu-right" style="">
                                          <li><a href="/pedidos/{{ $pedido->num_orden }}">Ver detalles</a></li>
                                          <li><a href="#">Pagado</a></li>
                                          <li><a href="#">Cancelado</a></li>
                                      </ul>
                                  </div>
                              </td>
                          </tr>
                        @endforeach
                    @else
                       <tr>
                          <td colspan="7" class="text-center">No se encontraron órdenes</td>
                       </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
