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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30">Tipos de pago para usar el sistema</p>
                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                  <thead>
                                      <th>Código</th>
                                      <th>Nombre</th>
                                      <th>Referencia</th>
                                      <th>Descripción</th>
                                      <th>Estado</th>
                                      <th colspan="2" class="text-center">Opciones</th>
                                      </thead>
                                      <tbody>
                                      @foreach ($tipopagos as $p)
                                      <tr>
                                          <td>{{ $p->codigo}}</td>
                                          <td>{{ $p->nombre}}</td>
                                          <td>{{ $p->referencia}}</td>
                                          <td>{{ $p->descripcion}}</td>
                                          <td>{{ $p->estado=='A'?'Activo':'Inactivo'}}</td>
                                          <td class="text-center">
                                              <a class="btn btn-info" title="Editar" href="{{URL::action('TipoPagoController@edit',$p->idTipoPago)}}"><i class="fa fa-edit"></i></a>
                                          </td>
                                          <td class="text-center">
                                              <a class="btn btn-danger" title="Cambiar estado" href="{{URL::action('TipoPagoController@cambiarEstado',$p->idTipoPago)}}"><i class="fa fa-exchange"></i></a>
                                          </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{$tipopagos->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
  @include('layouts.styles.datatables')
@endpush
@push('scripts')
  @include('layouts.scripts.datatables')
@endpush
