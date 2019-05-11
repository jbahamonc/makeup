@extends('layouts.app')

@section('content')
<div id="page-head">
    <div id="page-title">
        <h1 class="page-header text-overflow">Gestión de categorias y Subcategorias</h1>
    </div>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Listado de Categorias</h3>
                </div>
                <div class="panel-body">
                    <div class="newtoolbar">
                        <div id="demo-custom-toolbar2" class="table-toolbar-left">
					        <button id="demo-dt-addrow-btn" class="btn btn-primary">
                                <i class="demo-pli-plus"></i> Nueva Categoria
                            </button>
					    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagen</th>
                                    <th>Categoria</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img class="img-circle" width="50" src="{{ asset('image/categoria.png') }}" alt=""></td>
                                    <td>Pestañas</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="demo-psi-remove icon-lg"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="demo-pli-pen-5 icon-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Listado de Subcategorias</h3>
                </div>
                <div class="panel-body">
                    <div class="newtoolbar">
                        <div id="demo-custom-toolbar2" class="table-toolbar-left">
					        <button id="demo-dt-addrow-btn" class="btn btn-primary">
                                <i class="demo-pli-plus"></i> Nueva Subcategoria
                            </button>
					    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagen</th>
                                    <th>Categoria</th>
                                    <th>Subcategoria</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img class="img-circle" width="50" src="{{ asset('image/categoria.png') }}" alt=""></td>
                                    <td>Rostro</td>
                                    <td>Pestañas</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="demo-psi-remove icon-lg"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="demo-pli-pen-5 icon-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection