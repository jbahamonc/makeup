@extends('layouts.app')

@section('content')
    {{-- <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Panel de Gestión de Productos</h1>
        </div>
    </div> --}}
    <div id="page-content">
        <div class="row pad-btm">
            <div class="col-sm-6 toolbar-right"></div>
            <div class="col-sm-6 toolbar-right text-right">
                <a href="/productos/editar/0" id="demo-btn-addrow" class="btn btn-success btn-lg">Nuevo Producto</a>
            </div>
        </div>
        <div class="row">
           @foreach ($productos as $pro)
             @if ($pro->codigo != 'euDYCJQMId')
               <div class="col-xs-12 col-sm-6 col-md-3">
                   <div class="panel pos-rel">
                       <div class="pad-all text-center">
                           <a href="#">
                               <img alt="{{ $pro->nombre }}" class="img-lg img-circle mar-ver" src="{{ (count($pro->imagenes) > 0)? asset('storage/' . $pro->imagenes[0]->url) : asset('image/img-placeholder.jpg') }}">
                               <p class="text-lg text-semibold text-main">{{ $pro->nombre }}</p>
                               <p class="text-sm text-left">Ref <span class="pull-right">{{ $pro->referencia }}</span></p>
                               <p class="text-sm text-left">En almacen <span class="pull-right">{{ $pro->cantidad }} UND</span></p>
                               <p class="text-normal text-dark text-bold">Precio: ${{ number_format($pro->precio_normal, 0) }}</p>
                           </a>
                           <div class="text-center pad-to">
                               <div class="btn-group">
                                   <a href="" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Eliminar</a>
                                   <a href="/productos/editar/{{ $pro->codigo }}" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Editar</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               @endif
            @endforeach
        </div>
    </div>
@endsection
