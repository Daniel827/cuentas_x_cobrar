@extends('layouts.adminpanel')
@section('titulo','Tipos de pago')
@section('contenido')
<div>
            <div class="page-title">
              <div class="title_left">
                <h3>Tipos de pago</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Listado</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <table class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Referencia</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </thead>
                               @foreach ($tipopagos as $p)
                                <tr>
                                    <td>{{ $p->codigo}}</td>
                                    <td>{{ $p->nombre}}</td>
                                    <td>{{ $p->referencia}}</td>
                                    <td>{{ $p->descripcion}}</td>
                                    <td>{{ $p->estado}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{URL::action('TipoPagoController@edit',$p->idTipoPago)}}">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
