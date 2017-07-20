@extends('layouts.adminpanel')
@section('titulo','Tipos de pago')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Tipos de pago</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                <a href="{{url('tipopagos/create')}}" title="Nuevo tipo de pago" class="btn btn-default">
                    <i class="fa fa-plus-circle"></i> Nuevo
                </a>
            </div>
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
                                    <th class="text-center"></th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Referencia</th>
                                    <th>Descripción</th>
                                    <th class="text-center">Estado</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipopagos as $p)
                                        <tr>
                                            <td class="text-center">
                                                <a class="btn btn-info" title="Editar" href="{{URL::action('TipoPagoController@edit',$p->idTipoPago)}}"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>{{ $p->codigo}}</td>
                                            <td>{{ $p->nombre}}</td>
                                            <td>{{ $p->referencia}}</td>
                                            <td>{{ $p->descripcion}}</td>
                                            @php
                                            $is_active=$p->estado=='A';
                                            @endphp
                                            <td class="text-center">
                                                <span class="label label-{{$is_active?'success':'danger'}} pull-right">{{ $is_active?'Activo':'Inactivo'}}</span>
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
