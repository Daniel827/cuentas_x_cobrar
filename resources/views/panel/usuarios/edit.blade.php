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

    
    <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="name" id="name" class="form-control" type="text" value="{{$usuarios->name}}" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">Email <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="email" id="email" class="form-control" type="email" value="{{$usuarios->email}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Password <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="password" id="password" class="form-control" type="text" value="{{$usuarios->password}}" required>
      </div>
    </div>



    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
  </form>

</div>











	















     
@endsection






