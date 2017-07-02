@extends('layouts.adminpanel')
@section('titulo','Crear Cajero')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Crear cajero</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos del cajero</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form action="{{url('cajeros')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="idUser" class="col-lg-2 control-label">IdUser <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="idUser" id="idUser" class="form-control" type="number" value="{{old('idUser')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cedula_ruc" class="col-lg-2 control-label">Cédula_Ruc <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="cedula_ruc" id="cedula_ruc" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{old('cedula_ruc')}}" required maxlength="13" minlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombres" class="col-lg-2 control-label">Nombres <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="nombres" id="nombres" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}\s[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}" type="text" value="{{old('nombres')}}" required maxlength="25">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="apellidos" class="col-lg-2 control-label">Apellidos <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="apellidos" id="apellidos" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}\s[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}" type="text" value="{{old('apellidos')}}" required maxlength="25">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fechaNac" class="col-lg-2 control-label">Fecha_Nacimiento <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="fechaNac" id="fechaNac" class="form-control" type="date" step="1" value="{{old('fechaNac')}}" required min="1991-01-01" max="2017-12-31" value="1991-01-01">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ciudadNac" class="col-lg-2 control-label">Ciudad_Nacimiento <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="ciudadNac" id="ciudadNac" class="form-control" type="text" value="{{old('ciudadNac')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="direccion" id="direccion" class="form-control" type="text" value="{{old('direccion')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="telefono" id="telefono" class="form-control" pattern="09[0-9]{8}" type="tel" value="{{old('telefono')}}" required maxlength="10" minlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Email <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="email" id="email" class="form-control" type="text" data-validation="email" value="{{old('email')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
                            <div class="col-lg-10" class="col-xs-5 selectContainer">
                                <select name="estado" id="estado" class="form-control" type="text" value="{{old('estado')}}" required onchange="crear(this.value)">
                                    <option value="">Elija un Estado</option>
                                    <option value="A">Activo (A)</option>
                                    <option value="I">Inactivo (I)</option>
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
