@extends('layouts.app')

@section('content')

<div id="page-content">
    <div class="row pad-btm">
        <div class="col-sm-6 toolbar-left">
            <h1 class="page-header text-overflow" style="color:#FFF;">Formulario de registro</h1>
        </div>
        <div class="col-sm-6 toolbar-right text-right">
            <button class="btn btn-primary">Registrar Promoción</button>
        </div>
        <div class="clearfix"></div>
        <div class="fixed-fluid">
            <div class="fixed-sm-300 pull-sm-right">
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
            </div>
            <div class="fluid">
                <div class="form-group">
                    <input type="text" placeholder="Nombre de la promoción" class="form-control input-lg">
                </div>   
                <div class="panel">
                    <div class="panel-body">                    
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p class="text-main text-bold mar-no">Descuento</p>
                                    <p>Ingrese el procentaje de descuento a aplicar.</p>
                                    <input type="number" placeholder="%" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p class="text-main text-bold mar-no">Fecha Final</p>
                                    <p>Ingrese la fecha de finalización de la promoción.</p>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p class="text-main text-bold mar-no">Imagen</p>
                                    <p>Seleccione la imagen que representara la promoción.</p>
                                    <span class="pull-left btn btn-primary btn-file">
                                        Seleccione Archivo... <input type="file">
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
                            <p class="text-main text-bold mar-no">Categorias</p>
                            <p>Seleccione la categoria o categorias a las cuales aplicara la promoción.</p>
                            <select class="selectpicker" title="Ninguna categoria seleccionada" multiple data-live-search="true" data-width="100%">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p class="text-main text-bold mar-no">Productos Seleccionados</p>
                            <p>Seleccione los productos que haran parte de la promoción.</p>
                            <select class="selectpicker" title="Ningún producto seleccionado" multiple data-live-search="true" data-width="100%">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection