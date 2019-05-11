@extends('layouts.app')

@section('content')
<div id="page-content">
    <div class="row pad-btm">
        <div class="col-sm-6 toolbar-left">
            <h1 class="page-header text-overflow" style="color:#FFF;">Formulario de registro</h1>
        </div>
        <div class="col-sm-6 toolbar-right text-right">
            <button class="btn btn-primary">Registrar Producto</button>
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
                                <button id="dz-upload-btn" class="btn btn-primary" type="submit" disabled="">
                                    <i class="fa fa-upload-cloud"></i> Subir
                                </button>
                                <button id="dz-remove-btn" class="btn btn-danger cancel" type="reset" disabled="">
                                    <i class="demo-psi-trash"></i>
                                </button>
                            </div>
                        </div>  
                        <div id="dz-previews">
                            <div id="dz-template" class="pad-top bord-top">
                                <div class="media">
                                    <div class="media-body">
                                            <!--This is used as the file preview template-->
                                        <div class="media-block">
                                            <div class="media-left">
                                                <img class="dz-img" data-dz-thumbnail>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-main text-bold mar-no text-overflow" data-dz-name></p>
                                                <span class="dz-error text-danger text-sm" data-dz-errormessage></span>
                                                <p class="text-sm" data-dz-size></p>
                                                <div id="dz-total-progress" style="opacity:0">
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
                    </div>
                </div>
            </div>
            <div class="fluid">
                <div class="form-group">
                    <input type="text" placeholder="Titulo del Producto" class="form-control input-lg">
                </div>   
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <p class="text-main text-bold mar-no">Descripción del Producto</p>
                            <p>Ingrese una descripción breve del producto.</p>
                            <textarea placeholder="Descripción" rows="8" class="form-control"></textarea>
                        </div>                     
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p class="text-main text-bold mar-no">Referencia</p>
                                    <p>Este código se usa para identificar al producto.</p>
                                    <input type="number" placeholder="Referencia" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p class="text-main text-bold mar-no">Precio</p>
                                    <p>Ingrese el precio normal del producto  en el mercado.</p>
                                    <input type="number" placeholder="Precio regular" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-main text-bold mar-no">En Almacén</p>
                                <p>Ingrese la cantidad que hay en stock del producto.</p>
                                <input type="number" placeholder="Stock" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p class="text-main text-bold mar-no">Subcategoria</p>
                                <p>Seleccione la subcategoria del producto.</p>
                                <div class="select">
                                    <select data-placeholder="Choose a Country..." id="demo-chosen-select" tabindex="-1">
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
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
                        <ul class="mail-attach-list list-ov">
                            <li>
                                <div class="thumbnail">
                                    <div class="mail-file-img">
                                        <img class="image-responsive" src="http://www.themeon.net/nifty/v2.9.1/img/bg-img/bg-img-4.jpg" alt="image">
                                    </div>
                                    <div class="caption text-center">
                                        <div class="flex">
                                            <input id="color" type="text" placeholder="Color" class="form-control inline input-sm" style="margin-bottom: 5px;">
                                            <input id="codigo" type="color" placeholder="Codigo" class="form-control inline input-sm">
                                        </div>
                                        <a href="#" class="btn btn-sm btn-default">
                                            <i class="demo-pli-recycling icon-lg icon-fw" id="image-delete"></i>
                                        </a>
                                    </div>                                    
                                </div>
                            </li>
                            <li class="add-image">
                                <a href="#" class="thumbnail">
                                    <div class="mail-file-icon">
                                        <i class="demo-pli-add" id="icon-add"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection