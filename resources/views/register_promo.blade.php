@extends('layouts.app')

@section('content')

<div id="page-content">
      @if (session('status'))
        <div class="panel-alert">
         <div class="alert alert-success" role="alert">
              <button class="close" type="button"data-dismiss="alert" aria-label="Close"><i class="pci-cross pci-circle"></i></button>
              <div class="media" style="margin: 0">
                  <strong>Bien echo!</strong> Promocion guardada exitosamente. Quieres <a href="/promocion/editar/0" class="text-dark text-bold"> agregar una nueva promoción.</a>
              </div>
         </div>
        </div>
      @endif
    <div class="row pad-btm">
        <div class="pad-btm text-right">
             <button id="save-promo" class="btn btn-success btn-lg" style="width:300px">Guardar Promoción</button>
        </div>
        <div class="clearfix"></div>
        <div class="fixed-fluid">
            <div class="fixed-sm-300 pull-sm-right">
               @if ( $promocion->estado == 1)
                   <div class="panel media middle panel-colorful">
                       <div class="media-left pad-all">
                           <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                               <i class="demo-pli-like icon-2x"></i>
                               {{-- <i class="demo-pli-unlike icon-2x"></i>--}}
                           </span>
                       </div>
                       <div class="media-body">
                           <p class="text-2x mar-no text-semibold text-success">Activo</p>
                           <p class="mar-no">La promoción esta activa</p>
                       </div>
                   </div>
                @else
                   <div class="panel media middle panel-colorful">
                      <div class="media-left pad-all">
                          <span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
                              <i class="demo-pli-unlike icon-2x"></i>
                          </span>
                      </div>
                      <div class="media-body">
                          <p class="text-2x mar-no text-semibold text-danger">Inactiva</p>
                          <p class="mar-no">La promoción no esta activa</p>
                      </div>
                   </div>
                 @endif
                <div class="panel">
                   <div class="panel-heading">
		                <h3 class="panel-title">Imagen actual de la promo</h3>
		             </div>
                   <div class="panel-body" id="img-promo">
                        <div class="thumbnail mar-no">
                           <img alt="" src="{{ $promocion->imagen }}" data-holder-rendered="true">
                        </div>
                   </div>
                </div>
            </div>
            <div class="fluid">
               <form id="form-promo" action="/promociones/{{ $promocion->id }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <input type="hidden" name="accion" value="{{ $accion }}">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="row">
                             <div class="col-sm-12">
                                 <div class="form-group">
                                    <p class="text-main text-bold mar-no">Nombre</p>
                                    <p>Ingrese el nombre de la promoción.</p>
                                    <input type="text" value="{{ $promocion->nombre }}" name="nombre" placeholder="Nombre de la promoción" class="form-control input-lg">
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="form-group">
                                      <p class="text-main text-bold mar-no">Descuento</p>
                                      <p>Ingrese el procentaje de descuento a aplicar.</p>
                                      <input type="number" value="{{ $promocion->descuento }}" name="descuento" placeholder="%" class="form-control">
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="form-group">
                                      <p class="text-main text-bold mar-no">Fecha Inicial</p>
                                      <p>Ingrese la fecha de inicio de la promoción.</p>
                                      <input type="date" value="{{ $promocion->fecha_inicio }}" name="fecha_ini" class="form-control">
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="form-group">
                                      <p class="text-main text-bold mar-no">Fecha Final</p>
                                      <p>Ingrese la fecha de finalización de la promoción.</p>
                                      <input type="date" value="{{ $promocion->fecha_fin }}" name="fecha_fin" class="form-control">
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <p class="text-main text-bold mar-no">Imagen</p>
                                      <p>Seleccione la imagen que representara la promoción.</p>
                                      <span class="pull-left btn btn-primary btn-file">
                                          Seleccione Archivo... <input type="file" name="imagen">
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel">
                      <div class="panel-heading">
                          <h3 class="panel-title text-bold">Selección de Productos</h3>
                      </div>
                      <div class="panel-body">
                          <div class="form-group">
                              <p class="text-main text-bold mar-no">Productos</p>
                              <p>Seleccione los productos que haran parte de la promoción.</p>
                              <select class="selectpicker" name="productosPromo[]" title="Ningún producto seleccionado" multiple data-live-search="true" data-width="100%">
                                 @foreach ($productos as $pro)
                                    <option {{ ($pro->promocion_id == $promocion->id)? 'selected' : '' }} value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                                 @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
               </form>
            </div>
        </div>
    </div>
</div>

@endsection
