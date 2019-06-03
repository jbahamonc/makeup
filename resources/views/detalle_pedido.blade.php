@extends('layouts.app')

@section('content')
<div id="page-content">
   <div class="row">
      <div class="col-md-8 table-responsive">
         <div class="panel">
            <div class="panel-body">
               <h3 class="text-main text-normal text-2x mar-no">Informacion de Orden</h3>
               <h5 class="text-uppercase text-muted text-normal">Numero de Orden: 2568935678</h5>
               <hr class="new-section-xs">
               <div class="row mar-top">
                    <div class="col-sm-4">
                        <div class="text-lg">
                           <p class="text-5x text-thin text-main text-center"><i class="demo-pli-calendar-4"></i></p>
                        </div>
                        <p class="text-sm text-bold text-center">02/05/2019 02:56 P.M</p>
                        <p class="text-sm text-center">Fecha de Pedido</p>
                    </div>
                    <div class="col-sm-8">
                        <div class="list-group bg-trans mar-no">
                            <a class="list-group-item" href="#">
                               <i class="demo-pli-male icon-lg icon-fw"></i> Andres Fonseca
                            </a>
                            <a class="list-group-item" href="#">
                               <i class="demo-pli-mail icon-lg icon-fw"></i> sandres9011@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-right demo-nifty-btn-group">
                   <div class="btn-group">
                      <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                              Cambiar Estado <i class="dropdown-caret"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-right" style="">
                              <li><a href="#">Pagado</a></li>
                              <li><a href="#">Cancelado</a></li>
                          </ul>
                      </div>
                   </div>
                   <div class="btn-group">
                     <button class="btn btn-info">Orden de Despacho</button>
                  </div>
                </div>
            </div>
         </div>
         <div class="panel">
             <table class="table invoice-summary">
                 <thead>
                     <tr>
                         <th class="text-uppercase" style="padding-left: 20px" colspan="2">Productos</th>
                         <th class="min-col text-center text-uppercase">Cant.</th>
                         <th class="min-col text-center text-uppercase">Precio</th>
                         <th class="min-col text-right text-uppercase" style="padding-right: 20px">Total</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td width="80" style="padding-left: 20px">
                            <img src="/image/categoria.png" alt="Profile Picture" class="img-md">
                         </td>
                         <td>
                            <a class="text-info" href="/productos/editar/23123">Logo Design Package</a>
                         </td>
                         <td class="text-center">1</td>
                         <td class="text-center">$80.55</td>
                         <td class="text-right" style="padding-right: 20px">$161.1</td>
                     </tr>
                     <tr>
                         <td width="80" style="padding-left: 20px">
                            <img src="/image/categoria.png" alt="Profile Picture" class="img-md">
                         </td>
                         <td>
                            <a class="text-info" href="/productos/editar/23123">Logo Design Package</a>
                         </td>
                         <td class="text-center">1</td>
                         <td class="text-center">$80.55</td>
                         <td class="text-right" style="padding-right: 20px">$161.1</td>
                     </tr>
                 </tbody>
             </table>
             <div class="clearfix">
   	            <table class="table invoice-total">
   	                <tbody>
   	                    <tr>
   	                        <td class="text-2x text-main">Total</td>
   	                        <td class="text-2x text-main" style="padding-right: 20px">$612.040</td>
   	                    </tr>
   	                </tbody>
   	            </table>
   	        </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="panel media pad-all bg-warning">
             <div class="media-left">
                 <span class="icon-wra icon-wap-sm bg-ifo">
                 <i class="demo-pli-exclamation icon-3x"></i>
                 </span>
             </div>
             <div class="media-body">
                <p class="mar-no">Estado de Orden</p>
                 <p class="text-2x mar-no text-semibold">Pendiente</p>
             </div>
         </div>
         <div class="panel media pad-all bg-danger" style="display:none">
             <div class="media-left">
                 <span class="icon-wra icon-wap-sm bg-ifo">
                 <i class="demo-pli-cross icon-3x"></i>
                 </span>
             </div>
             <div class="media-body">
                <p class="mar-no">Estado de Orden</p>
                 <p class="text-2x mar-no text-semibold">Cancelada</p>
             </div>
         </div>
         <div class="panel media pad-all bg-success" style="display:none">
             <div class="media-left">
                 <span class="icon-wra icon-wap-sm bg-ifo">
                 <i class="demo-pli-like icon-3x"></i>
                 </span>
             </div>
             <div class="media-body">
                <p class="mar-no">Estado de Orden</p>
                 <p class="text-2x mar-no text-semibold">Pagada</p>
             </div>
         </div>
          <div class="panel">
             <div class="widget-header bg-purple">
               <img class="widget-bg img-responsive" src="{{ asset('image/map.jpg') }}" alt="Image">
            </div>
            <div class="panel-heading">
                <div class="panel-control">
                    <button class="btn btn-default" data-panel="fullscreen">
                        <i class="icon-max demo-psi-maximize-3"></i>
                        <i class="icon-min demo-psi-minimize-3"></i>
                    </button>
                </div>
                <h3 class="panel-title">Direccion de Envio</h3>
            </div>
            <div class="panel-body">
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Nombre</p>
                    Andres Fonseca
                </div>
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Direccion</p>
                    calle 13 # 0 - 31 Motilones
                </div>
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Cuidad - Departamento</p>
                    Cucuta - Norte de Santander
                </div>
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Codigo Postal</p>
                    540001
                </div>
                <div class="mar-btm">
                    <p class="text-main text-lg mar-no">Pais</p>
                    Colombia
                </div>
            </div>
        </div>
        <div class="panel">
          <div class="widget-header bg-purple">
             <img class="widget-bg img-responsive" src="{{ asset('image/map.jpg') }}" alt="Image">
          </div>
          <div class="panel-heading">
             <div class="panel-control">
                  <button class="btn btn-default" data-panel="fullscreen">
                      <i class="icon-max demo-psi-maximize-3"></i>
                      <i class="icon-min demo-psi-minimize-3"></i>
                  </button>
             </div>
             <h3 class="panel-title">Direccion de Facturacion</h3>
          </div>
          <div class="panel-body">
             <div class="mar-btm">
                  <p class="text-main text-lg mar-no">Nombre</p>
                  Andres Fonseca
             </div>
             <div class="mar-btm">
                  <p class="text-main text-lg mar-no">Direccion</p>
                  calle 13 # 0 - 31 Motilones
             </div>
             <div class="mar-btm">
                  <p class="text-main text-lg mar-no">Cuidad - Departamento</p>
                  Cucuta - Norte de Santander
             </div>
             <div class="mar-btm">
                  <p class="text-main text-lg mar-no">Codigo Postal</p>
                  540001
             </div>
             <div class="mar-btm">
                  <p class="text-main text-lg mar-no">Pais</p>
                  Colombia
             </div>
          </div>
        </div>
        <div class="panel media middle pad-all">
             <div class="media-left">
                 <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                    <i class="demo-pli-wallet-2 icon-2x"></i>
                 </span>
             </div>
             <div class="media-body">
                <p class="text-muted mar-no">Metodo de Pago</p>
                 <p class="text-2x mar-no text-semibold text-main">PayU</p>
             </div>
         </div>
      </div>
   </div>
</div>
@endsection
