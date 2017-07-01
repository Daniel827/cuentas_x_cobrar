@extends('layouts.adminpanel')
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
                     




                             <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>IdUser</th>
                                    <th>Cedula_Ruc</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                     <th>Fecha_Nac</th>
                                     <th>Ciudad_Nac</th>
                                     <th>Dirección</th>
                                     <th>Teléfono</th>
                                     <th>Email</th>
                                     <th>Estado</th>
                                    <th>Opciones</th>
                                   
                                </thead>
                               @foreach ($cajeros as $p)
                                <tr>
                                    <td>{{ $p->idUser}}</td>    <!--nombre de la variable de la base de datos-->
                                    <td>{{ $p->cedula_ruc}}</td>
                                    <td>{{ $p->nombres}}</td>
                                    <td>{{ $p->apellidos}}</td>
                                    <td>{{ $p->fechaNac}}</td>
                                    <td>{{ $p->ciudadNac}}</td>
                                    <td>{{ $p->direccion}}</td>
                                    <td>{{ $p->telefono}}</td>
                                    <td>{{ $p->email}}</td>
                                    <td>{{ $p->estado}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{URL::action('CajeroController@edit',$p->idCajero)}}">Editar</a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger" data-toggle="modal" data-idUser="{{ $p->idUser}}" data-action="{{URL::action('CajeroController@destroy',$p->idCajero)}}" href="#modalEliminarCajero">Eliminar</a>
                                      </td>

                                </tr>
                                @endforeach
                            
                    </table>
          
          
                  </div>
                  {{$cajeros->render()}}
                </div>
                 @include('panel.cajeros.delete')
              </div>
            </div>
          </div>
        </div>

     </div>
   </div>
          
@endsection
@push('scripts')
    <script type="text/javascript">
    $(document).ready(function () {
        $('#modalEliminarCajero').on('show.bs.modal', function (event)  {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var idUser = button.data('idUser');
            var modal = $(this);
            modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar al Caj con IdUsuario "+idUser+"?");
            modal.find(".modal-body form").attr('action',action);
        });
    });
</script>
@endpush