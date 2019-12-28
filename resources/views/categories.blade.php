@extends('layouts.app')

@section('content')
<div id="page-head">
    <div id="page-title">
        <h1 class="page-header text-overflow"></h1>
    </div>
</div>
<div id="page-content">
   @if (session('msg'))
     <div class="panel-alert">
         <div class="alert alert-success" role="alert">
              <button class="close" type="button"data-dismiss="alert" aria-label="Close"><i class="pci-cross pci-circle"></i></button>
              <div class="media" style="margin: 0">{{ session('msg') }}</div>
         </div>
     </div>
   @endif
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-control">
                       <button data-target="#modal-categorias" data-toggle="modal" class="btn btn-primary">Nueva Categoria</button>
                    </div>
                    <h3 class="panel-title">Listado de Categorias</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Categoria</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               @if ( sizeof($categorias) > 0 )
                                  @foreach ($categorias as $cat)
                                     <tr>
                                         <td><img class="" width="50" src="{{ $cat->imagen }}" alt=""></td>
                                         <td>{{ $cat->nombre }}</td>
                                         <td class="text-center">
                                             <button class="btn btn-sm btn-danger hidden">
                                                 <i class="demo-psi-remove icon-lg"></i>
                                             </button>
                                             <button class="btn btn-sm btn-primary" data-target="#modal-categorias" data-toggle="modal" data-id="{{ $cat->id }}">
                                                 <i class="demo-pli-pen-5 icon-lg"></i>
                                             </button>
                                         </td>
                                     </tr>
                                  @endforeach
                               @else
                                  <tr>
                                     <td colspan="3">No hay categorias registradas</td>
                                  </tr>
                               @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-control">
                         <button id="demo-dt-addrow-btn" data-target="#modal-subcategorias" data-toggle="modal" class="btn btn-primary">
                             <i class="demo-pli-plus"></i> Nueva Subcategoria
                         </button>
                    </div>
                    <h3 class="panel-title">Listado de Subcategorias</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Categoria</th>
                                    <th>Subcategoria</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ( sizeof($subcategorias) > 0 )
                                    @foreach ($subcategorias as $sub)
                                    <tr>
                                        <td><img width="50" src="{{ $sub->imagen }}" alt=""></td>
                                        <td>{{ $sub->categoria->nombre }}</td>
                                        <td>{{ $sub->nombre }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-danger hidden">
                                                <i class="demo-psi-remove icon-lg"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" data-id="{{ $sub->id }}" data-target="#modal-subcategorias" data-toggle="modal">
                                                <i class="demo-pli-pen-5 icon-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                 <tr>
                                    <td colspan="3">No hay categorias registradas</td>
                                 </tr>
                              @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal categorias --}}
<div class="modal fade" id="modal-categorias" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <form class="" action="/categorias" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="old-img" value="" id="old-img">
                   <!--Modal header-->
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                       <h4 class="modal-title">Registro de Categorias</h4>
                   </div>
                   <!--Modal body-->
                   <div class="modal-body">
                         <div class="form-group">
                              <label class="control-label" for="name">Nombre de la categoria</label>
                              <input id="categoria" required name="categoria" type="text" class="form-control input-md" required>
                         </div>
                         <div class="form-group">
                            <label class="control-label" for="name">Seleccione imagen</label>
                            <span class="btn btn-primary btn-file">
			                          Browse... <input type="file" name="img">
					             </span>
                         </div>
                   </div>
                   <!--Modal footer-->
                   <div class="modal-footer">
                       <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                       <button class="btn btn-primary" type="submit">Guardar</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
{{-- final modal categorias --}}
{{-- Modal subcategorias --}}
<div class="modal fade" id="modal-subcategorias" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
            <form class="" action="/subcategorias" method="post" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="old-img-sub" value="" id="old-img-sub">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Modal Heading</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="categoria">Categorias</label>
                        <div class="select">
                            <select name="categoria" id="categoria" required>
                                   <option disabled selected>Seleccione</option>
                                   <option value="1">sin categoria</option>
                                   @foreach ($categorias as $cat)
                                      <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                   @endforeach
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                           <label class="control-label" for="subcategoria">Nombre de la subcategoria</label>
                           <input id="subcategoria" name="subcategoria" type="text" class="form-control input-md" required>
                    </div>
                    <div class="form-group">
                         <label class="control-label" for="img-subcat">Seleccione imagen</label>
                         <span class="btn btn-primary btn-file">
    	                          Browse... <input type="file" name="img-subcat">
    			            </span>
                    </div>
                </div>
                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
             </form>
         </div>
     </div>
 </div>
{{-- final modal subcategorias --}}
@endsection
