@extends('layouts.adminpanel')
@section('contenido')
<div>
            <div class="page-title">
              <div class="title_left">
                <h3>Usuarios</h3>
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
                     



   <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
            
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     
                           </p>
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha Creacion</th>
                                     <th>Ultima Actualizacion</th>
                               
                                    <th>Opciones</th>
                                   
                                </thead>
                                @foreach ($usuarios as $p)
                                <tr>
                                    <td>{{ $p->name}}</td>    <!--nombre de la variable de la base de datos-->
                                    <td>{{ $p->email}}</td>
                                    <td>{{ $p->created_at}}</td>
                                      <td>{{ $p->updated_at}}</td>
                                    
                                    <td>

                                      <!--<a class="btn btn-danger" data-toggle="modal" data-name="{{$p->name}}" data-action="{{URL::action('UserController@destroy',$p->id)}}" href="#modalEliminarUsuario">Eliminar</a>-->
                                      <a class="btn btn-danger" href="{{URL::action('UserController@destroy',$p->id)}}">Eliminar</a>
                                        

                                        </td>
                                </tr>
                                @endforeach
                            
                    </table>
          
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

     </div>
   </div>
          
@endsection

@push('scripts')
  <script type="text/javascript">
    $(document).ready(function()){
      $('#modalEliminarUsuario').on('show.bs.modal', function (event){
        var button= $(event.relatedTarget);
        var button= button.data('action');
        var button= button.data('name');
        var button= $(this);
        modal.find(".modal-body #txtEliminar").text("¿Estás seguro de Eliminar al usuario con nombre"+name+"?");
        modal.find(".modal-body form").attr('action',action);

      });
    });

  </script>
  @endpush
