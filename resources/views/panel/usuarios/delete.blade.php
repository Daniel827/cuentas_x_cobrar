@extends('layouts.adminpanel')
@section('contenido')
<div>
      








<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Editar producto</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
 

 <form method="POST" action="http://localhost:8000/usuarios/{{$usuarios->id}}" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PATCH">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$usuarios->id}}">

    




<div class="modal fade" id="modalEliminarUsuario" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title">Eliminar Ususario</h4>
    </div>
    <div class="modal-body">
      {{Form::open(['action'=>['UserController@destroy',""],'method'=>'delete'])}}
      <h4 id="txtEliminar" class="text-center text-muted">¿Estás Seguro?</h4>
      <h4 class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente en el registro. ¿Deseas Continuar?</h4>
      <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
           <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>
       {{Form::Close()}}
    </div>
       </div>
     </div>
  </div>




   









    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
  </form>



</div>

     
@endsection


