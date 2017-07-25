@extends('layouts.adminpanel')
@section('titulo','Cajeros')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Cajeros</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                <a href="{{url('cajeros/create')}}" title="Nuevo cajero" class="btn btn-default">
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
                                <p class="text-muted font-13 m-b-30">Cajeros abilitados para realizar las transacciones.</p>
                                @include('panel.mensajes.error')
                                @include('panel.mensajes.exito')
                                <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                    <thead>
                                    <th></th>
                                    <th>Usuario</th>
                                    <th>Cédula/Ruc</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th class="text-center">Estado</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cajeros as $p)
                                        <tr>
                                            <td class="text-center">
                                                <a class="btn btn-info" title="Editar"  href="{{URL::action('CajeroController@edit',$p->idCajero)}}"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>{{ $p->idUser!=null?$p->user->name:''}}</td>
                                            <td>{{ $p->cedula_ruc}}</td>
                                            <td>{{ $p->nombres}}</td>
                                            <td>{{ $p->apellidos}}</td>
                                            <td>{{ $p->telefono}}</td>
                                            <td>{{ $p->email}}</td>
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
                        {{$cajeros->render()}}
                    </div>
                    @include('panel.cajeros.delete')
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#modalEliminarCajero').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var idUser = button.data('idUser');
            var modal = $(this);
            modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar al Caj con IdUsuario " + idUser + "?");
            modal.find(".modal-body form").attr('action', action);
        });
    });
</script>
@endpush
