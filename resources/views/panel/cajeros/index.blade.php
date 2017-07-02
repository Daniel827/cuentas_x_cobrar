@extends('layouts.adminpanel')
@section('titulo','Cajeros')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Cajeros</h3>
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
                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                    <thead>
                                    <th>Usuario</th>
                                    <th>Cédula/Ruc</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th class="text-center" colspan="2">Opciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cajeros as $p)
                                        <tr>
                                            <td>{{ $p->idUser!=null?$p->user->name:''}}</td>
                                            <td>{{ $p->cedula_ruc}}</td>
                                            <td>{{ $p->nombres}}</td>
                                            <td>{{ $p->apellidos}}</td>
                                            <td>{{ $p->telefono}}</td>
                                            <td>{{ $p->email}}</td>
                                            <td>{{ $p->estado=='A'?'Activo':'Inactivo'}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info" title="Editar"  href="{{URL::action('CajeroController@edit',$p->idCajero)}}"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-danger" title="Eliminar" data-toggle="modal" data-idUser="{{ $p->idUser}}" data-action="{{URL::action('CajeroController@destroy',$p->idCajero)}}" href="#modalEliminarCajero"><i class="fa fa-trash"></i></a>
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
<!-- Datatables -->
<link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endpush
@push('scripts')
<!-- Datatables -->
<script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
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
