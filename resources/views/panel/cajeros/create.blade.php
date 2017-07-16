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
                    @include('panel.mensajes.error')
                    @include('panel.mensajes.exito')
                    <form action="{{url('cajeros')}}" data-parsley-validate method="POST" class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="estado" class="control-label col-lg-2">Usuario <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <select name="idUser" id="idUser" class="form-control" required onchange="crear(this.value)">
                                    <option value="">Elija un Usuario</option>
                                    @foreach ($usuarios as $p)
                                    <option {{old('idUser')==$p->id?'selected':''}} value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cedula_ruc"  class="control-label col-lg-2">Cédula/RUC <font color="red">*</font></label>
                              <div class="col-lg-10">
                                <input name="cedula_ruc" id="cedula_ruc" class="form-control" type="text" onkeypress="return esDigito()" pattern="[0-2][0-9]{9}(001)?" value="{{old('cedula_ruc')}}" required maxlength="13" minlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombres" class="col-lg-2 control-label">Nombres <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="nombres" id="nombres" class="form-control" onkeypress="return esLetra()" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}\s[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}" type="text" value="{{old('nombres')}}" required minlength="7" maxlength="25">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="apellidos" class="col-lg-2 control-label">Apellidos <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="apellidos" id="apellidos" class="form-control" onkeypress="return esLetra()" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}\s[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}" type="text" value="{{old('apellidos')}}" required minlength="7" maxlength="25">
                            </div>
                        </div>
                        <div class="form-group">
                            @php
                            $hoy=date('Y-m-d');
                            @endphp
                            <label for="fechaNac" class="col-lg-2 control-label">Fecha Nacimiento <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="fechaNac" id="fechaNac" class="form-control" type="date" value="{{old('fechaNac')}}" required min="1980-01-01" max="{{$hoy}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ciudadNac" class="col-lg-2 control-label">Ciudad Nacimiento <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="ciudadNac" id="ciudadNac" class="form-control" type="text" value="{{old('ciudadNac')}}" required maxlength="25" minlength="3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="direccion" id="direccion" class="form-control" type="text" value="{{old('direccion')}}" required maxlength="40" minlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="telefono" id="telefono" class="form-control" pattern="09[0-9]{8}" onkeypress="return esDigito()" type="tel" value="{{old('telefono')}}" required maxlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Email <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="email" id="email" class="form-control" type="email" data-validation="email" value="{{old('email')}}" required minlength="10" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
                            <div class="col-lg-10 col-xs-5 selectContainer">
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="">Elija un Estado</option>
                                    <option {{old('estado')=="A"?'selected':''}} value="A">Activo</option>
                                    <option {{old('estado')=="I"?'selected':''}} value="I">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Crear</button>
                                <a href="{{url('cajeros')}}" class="btn btn-default">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js\validaciones.js')}}"></script>
@endpush
