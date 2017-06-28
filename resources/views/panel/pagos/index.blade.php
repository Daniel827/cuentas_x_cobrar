@extends('layouts.adminpanel')
@section('titulo','Pagos')
@section('contenido')
<div>
            <div class="page-title">
              <div class="title_left">
                <h3>Pagos</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Listado de Pagos</h2>
                     <ul class="nav navbar-right panel_toolbox">
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                       </li>
                       <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                       </li>
                       <li><a class="close-link"><i class="fa fa-close"></i></a>
                       </li>
                     </ul>
                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">

                     <table id="datatable-buttons" class="table table-striped table-bordered">
                       <thead>
                         <tr>
                           <th>Cod Pago</th>
                           <th>Cajero</th>
                           <th>Cliente</th>
                           <th>Descripcion</th>
                           <th>Fecha</th>
                           <th>Num Pago</th>
                           <th>Total Pago</th>
                         </tr>
                       </thead>


                       @foreach ($productos as $p)
                                  <tr>
                                      <td>{{ $p->nombre}}</td>    <!--nombre de la variable de la base de datos-->
                                      <td>{{ $p->precio}}</td>
                                      <td>{{ $p->codigo}}</td>
                                      <td>{{ $p->cantidad}}</td>
                                      <td>{{ $p->minStock}}</td>
                                      <td>
                                          <a class="btn btn-info" href="{{URL::action('ProductoController@edit',$p->idProducto)}}">Editar</a>
                                      </td>
                                  </tr>
                                  @endforeach
                     </table>
                   </div>
                    {{$productos->render()}}   <!--Ayuda para mandar paginado-->
                 </div>
               </div>
            </div>
          </div>
@endsection
