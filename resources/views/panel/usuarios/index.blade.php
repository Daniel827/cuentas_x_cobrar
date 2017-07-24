@extends('layouts.adminpanel')
@section('titulo','Usuarios')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Usuarios</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                <a href="{{url('usuarios/create')}}" title="Nuevo usuario" class="btn btn-default">
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
                    <h2>Listado Usuarios</h2>
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
                                <p class="text-muted font-13 m-b-30">Usuarios abilitados para usar el sistema</p>
                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                    <thead>
                                    <th class="text-center"></th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Fecha Creación</th>
                                    <th>Última Actualización</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $u)
                                        <tr>
                                            <td class="text-center">
                                                <a class="btn btn-info" title="Editar"  href="{{URL::action('UserController@edit',$u->id)}}"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>{{ $u->name}}</td>
                                            <td>{{ $u->email}}</td>
                                            <td>
                                                @if($u->rol->first()->name=='admin')
                                                {{'Administrador'}}
                                                @elseif($u->rol->first()->name=='cajero')
                                                {{'Cajero'}}
                                                @else
                                                {{''}}
                                                @endif
                                            </td>
                                            <td>{{ $u->created_at}}</td>
                                            <td>{{ $u->updated_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{$usuarios->render()}}
                    </div>
                    @include('panel.usuarios.delete')
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
        $('#modalEliminarUsuario').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var name = button.data('name');
            var modal = $(this);
            modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar al usurio con nombre " + name + "?");
            modal.find(".modal-body form").attr('action', action);
        });
    });
</script>
@endpush
