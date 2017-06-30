@extends('layouts.adminpanel')
@section('contenido')
<div>
      

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Editar Cajero</h3>
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
 

 <form method="POST" action="http://localhost:8000/cajeros/{{$cajeros->idCajero}}" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PATCH">
    {{ csrf_field() }}
    <input type="hidden" name="idCajero" value="{{$cajeros->idCajero}}">
    
    <div class="form-group">
      <label for="idUser" class="col-lg-2 control-label">IdUser <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="idUser" id="idUser" class="form-control" type="text" value="{{$cajeros->idUser}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="cedula_ruc" class="col-lg-2 control-label">Cedula_Ruc <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="cedula_ruc" id="cedula_ruc" class="form-control" type="number" value="{{$cajeros->cedula_ruc}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="nombres" class="col-lg-2 control-label">Nombres <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="nombres" id="nombres" class="form-control" type="text" value="{{$cajeros->nombres}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="apellidos" class="col-lg-2 control-label">Apellidos <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="apellidos" id="apellidos" class="form-control" type="text" value="{{$cajeros->apellidos}}" required>
      </div>
    </div>
<div class="form-group">
      <label for="fechaNac" class="col-lg-2 control-label">Fecha_Nacimiento<font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="fechaNac" id="fechaNac" class="form-control" type="date" value="{{$cajeros->fechaNac}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="ciudadNac" class="col-lg-2 control-label">Ciudad_Nacimiento<font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="ciudadNac" id="ciudadNac" class="form-control" type="text" value="{{$cajeros->ciudadNac}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="direccion" class="col-lg-2 control-label">Dirección<font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="direccion" id="direccion" class="form-control" type="text" value="{{$cajeros->direccion}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="telefono" class="col-lg-2 control-label">Teléfono<font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="telefono" id="telefono" class="form-control" type="text" value="{{$cajeros->telefono}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">Email<font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="email" id="email" class="form-control" type="text" value="{{$cajeros->email}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="estado" class="col-lg-2 control-label">Estado<font color="red">*</font></label>
      <div class="col-lg-10">
        <select name="estado" id="estado" class="form-control" type="text" value="{{$cajeros->estado}}" required required onchange="crear(this.value)">
        <option value="A">Activo (A)</option>
        <option value="I">Inactivo (I)</option>
        </select>
      </div>
    </div>
    
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
  </form>

</div>











	















     
@endsection
