@extends('layouts.app')
@extends('layouts.adminpanel')
@section('titulo','Crear tipo de pago')
@section('contenido')
<div>
            <div class="page-title">
              <div class="title_left">
                <h3>Crear tipo de pago</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos del tipo de pago</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
      <form action="{{url('tipopagos')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="codigo" class="col-lg-2 control-label">Código <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="codigo" id="codigo" class="form-control" type="text" value="{{old('codigo')}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="nombre" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
      <div class="col-lg-10">   
        <input name="nombre" id="nombre" class="form-control" type="text" value="{{old('nombre')}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="referencia" class="col-lg-2 control-label">Referencia<font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="referencia" id="referencia" class="form-control" type="text" value="{{old('referencia')}}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="descripcion" class="col-lg-2 control-label">Descripcion <font color="red">*</font></label>
      <div class="col-lg-10">
        <input name="descripcion" id="descripcion" class="form-control" type="text" value="{{old('descripcion')}}" required>
      </div>  
    </div>
    <div class="form-group">
      <label for="estado" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
      <div class="col-lg-10">
      
    <select name="estado" id="estado" class="form-control" type="select" value="{{old('estado')}}" required>
        <option>-- Estado de Pago-- </option>
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
    </select>
      </div>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
