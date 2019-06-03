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
                        <th width="120">Fecha</th>
                        <th>Cliente</th>
                        <th  width="120" class="text-center">Pago</th>
                        <th  width="120" class="text-center">Despacho</th>
                        <th  width="120" class="text-right">Total</th>
                        <th width="80"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       <td><a class="text-info" href="/pedidos/2568935678">2568935678</a></td>
                        <td>02/05/2019</td>
                        <td>
                            Jefferson Bahamon
                        </td>
                        <td class="text-center">
                            <span class="label label-warning">PENDIENTE</span>
                        </td>
                        <td class="text-center">
                            <span class="label label-default">SIN DESPACHAR</span>
                        </td>
                        <td class="text-right">
                            $100.000
                        </td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button class="btn btn-trans dropdown-toggle dropdown-toggle-icon"
                                    data-toggle="dropdown" type="button" aria-expanded="false">
                                    <i class="demo-psi-dot-horizontal icon-lg"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" style="">
                                    <li><a href="#">Ver detalles</a></li>
                                    <li><a href="#">Pagado</a></li>
                                    <li><a href="#">Cancelado</a></li>
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
