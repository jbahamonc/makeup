@extends('layouts.app')

@section('content')
    <div id="page-head">                    
        <div id="page-title">
            <h1 class="page-header text-overflow">Panel de Gestión de Productos</h1>           
        </div>
    </div>
    <div id="page-content">
        <div class="row pad-btm">
            <div class="col-sm-6 toolbar-right"></div>
            <div class="col-sm-6 toolbar-right text-right">
                <a href="/productos/crear" id="demo-btn-addrow" class="btn btn-primary">Nuevo Producto</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="panel pos-rel">
                    <div class="pad-all text-center">
                        <a href="#">
                            <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="https://www.beter.es/2539-large_default/top-coat-gellack-step-4-regalo-esmalte.jpg">
                            <p class="text-lg text-semibold text-main">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                            <p class="text-sm text-left">Ref <span class="pull-right">sku87655</span></p>
                            <p class="text-sm text-left">En almacen <span class="pull-right">50 UND</span></p>
                            <p class="text-normal text-dark text-bold">Precio: $150.000</p>
                        </a>
                        <div class="text-center pad-to">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Eliminar</a>
                                <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
