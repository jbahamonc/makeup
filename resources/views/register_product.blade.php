@extends('layouts.app')

@section('content')
<div id="page-content">
    @if (session('status'))
      <div class="panel-alert">
        <div class="alert alert-success" role="alert">
            <button class="close" type="button"data-dismiss="alert" aria-label="Close"><i class="pci-cross pci-circle"></i></button>
            <div class="media" style="margin: 0">
                <strong>Bien echo!</strong> Producto guardado exitosamente. Quieres <a href="/productos/editar/0" class="text-dark text-bold"> agregar nuevo producto.</a>
            </div>
        </div>
      </div>
    @endif
    <div class="row pad-btm">
        <div class="col-sm-12 toolbar-right text-right">
            <button id="btn-save-products" class="btn btn-success btn-lg">Guardar Producto</button>
        </div>
        <div class="clearfix"></div>
        <div class="fixed-fluid">
            <div class="fixed-sm-300 pull-sm-right">
                <div class="panel">
                    <div class="panel-body">
                        <p class="text-main text-bold text-uppercase">Subida de Imagenes</p>
                        <p>Importante: A la hora de subir las imagenes del producto debe tener en cuenta las imagenes que van a representar los distintos colores del producto.</p>
                        <div class="pad-ver">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-success fileinput-button dz-clickable">
                                <i class="fa fa-plus"></i>
                                <span>Agregar Imagenes</span>
                            </span>
                            <div class="btn-group pull-right">
                                <button id="dz-upload-btn" class="btn btn-primary" data-product-id="{{ $producto->id }}" type="submit" disabled="">
                                    <i class="fa fa-upload-cloud"></i> Subir
                                </button>
                            </div>
                        </div>
                        <div>
                           <div id="dz-previews">
                               <div id="dz-template" class="pad-top bord-top">
                                   <div class="media">
                                       <div class="media-body">
                                           <div class="media-block">
                                               <div class="media-left">
                                                   <img class="dz-img" data-dz-thumbnail>
                                               </div>
                                               <div class="media-body">
                                                   <p class="text-main text-bold mar-no text-overflow" data-dz-name></p>
                                                   <span class="dz-error text-danger text-sm" data-dz-errormessage></span>
                                                   <p class="text-sm" data-dz-size></p>
                                                   <div class="dz-total-progress" style="opacity:0">
                                                       <div class="progress progress-xs active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                           <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="media-right">
                                           <button data-dz-remove class="btn btn-xs btn-danger dz-cancel"><i class="demo-psi-trash"></i></button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <hr style="margin-top: 0px">
                           <div class="row" id="list-img">
                           @foreach ($producto->imagenes as $img)
                              <div class="col-xs-6">
                                 <div class="thumbnail">
                                    <img alt="{{ $img->nombre }}" style="height: 100px; width: 100%; display: block;" src="{{ asset('storage/'.$img->url) }}" data-holder-rendered="true">
                                    <div class="caption text-center">
                                         <a href="#" class="btn btn-sm btn-default btn-circle btn-delete-img" data-img-id="{{ $img->id }}">
                                             <i class="demo-pli-recycling" id="image-delete"></i>
                                         </a>
                                    </div>
                                 </div>
                              </div>
                           @endforeach
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fluid">
                <form id="form-products" method="POST" action="/productos/{{ $producto->id }}" enctype="multipart/form-data" name="myForm">
                  @csrf
                  <input type="hidden" name="accion" value="{{ $accion }}">
                  <input type="hidden" name="codigo" id="codPro" value="{{ $producto->id }}">
                    <div class="panel">
                        <div class="panel-body">
                           <div class="form-group">
                              <p class="text-main text-bold mar-no">Nombre del Producto</p>
                              <p>Ingrese el nuevo nombre del producto.</p>
                              <input type="text" placeholder="Titulo del Producto" name="nombre" class="form-control input-lg" value="{{ $producto->nombre }}">
                            </div>
                            <div class="form-group">
                                <p class="text-main text-bold mar-no">Descripción del Producto</p>
                                <p>Ingrese una descripción breve del producto.</p>
                                <textarea placeholder="Descripción" name="descripcion" rows="8" class="form-control">{{ $producto->descripcion }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p class="text-main text-bold mar-no">Referencia</p>
                                        <p>Este código se usa para identificar al producto.</p>
                                        <input type="number" name="referencia" placeholder="Referencia" class="form-control" value="{{ $producto->referencia }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p class="text-main text-bold mar-no">Precio</p>
                                        <p>Ingrese el precio normal del producto  en el mercado.</p>
                                        <input type="number" name="precio" placeholder="Precio regular" class="form-control" value="{{ $producto->precio_normal }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <p class="text-main text-bold mar-no">En Almacén</p>
                                      <p>Ingrese la cantidad que hay en stock del producto.</p>
                                      <input type="number" name="stock" placeholder="Stock" class="form-control" value="{{ $producto->cantidad }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <p class="text-main text-bold mar-no">Categorias</p>
                                      <p>Seleccione la categoria del producto.</p>
                                      <div class="select">
                                          <select data-placeholder="Categoria" name="categoria" id="demo-chosen-select" tabindex="-1">
                                              @foreach ($categorias as $cat)
                                                <option {{ ($producto->categoria_id == $cat->id)? "selected" : "" }}  value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-main text-bold mar-no">Subcategoria</p>
                                    <p>Seleccione la subcategoria del producto.</p>
                                    <div class="select">
                                        <select data-placeholder="Subcategoria" name="subcategoria" id="demo-chosen-select" tabindex="-1">
                                          @foreach ($subcategorias as $sub)
                                            <option {{ ($producto->subcategoria_id == $sub->id)? "selected" : "" }}  value="{{ $sub->id }}">{{ $sub->nombre }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title text-bold">Opciones del Producto</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="mail-attach-list list-ov" id="listColor">                                
                                <li class="add-image">
                                    <a href="#" class="thumbnail"id="add-color" title="Agregar color">
                                        <div class="mail-file-icon">
                                            <i class="demo-pli-add" id="icon-add"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modal de imagenes para productos --}}
<div class="modal fade" id="default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true" style="display: none;">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                 <h4 class="modal-title">Seleccion de imagen</h4>
             </div>
             <div class="modal-body">
                <input type="hidden" value="">
                 <div class="row" id="list-img">
                    @if (count($producto->imagenes) > 0 )
                       @foreach ($producto->imagenes as $img)
                          <div class="col-xs-3  ">
                             <a href="#" class="thumbnail colorImg">
                                <img alt="{{ $img->nombre }}" style="height: 100px; width: 100%; display: block;" data-url="{{ $img->url }}" src="{{ asset('storage/'.$img->url) }}" data-holder-rendered="true">
                             </a>
                          </div>
                       @endforeach
                  @else
                     <p class="text-center">No hay imagenes cargadas</p>
                  @endif
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
