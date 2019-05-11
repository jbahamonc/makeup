@extends('layouts.app')

@section('content')

<div id="page-head">                    
    <div class="pad-all">
        <h3>
            Pedidos 
            <a href="/promociones/crear" id="demo-btn-addrow" class="btn btn-primary pull-right">Crear Promoción</a>
        </h3>
        <p>A continuación encontrara las pedidos registrados</p>
    </div>
</div>
<div id="page-content">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Listado de Pedidos</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th class="text-center min-width">Pago</th>
                        <th class="text-center min-width">Despacho</th>
                        <th class="text-right min-width">Total</th>
                        <th class="min-width"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
                        <td>
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