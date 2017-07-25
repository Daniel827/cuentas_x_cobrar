@extends('layouts.adminpanel')
@section('titulo','Editar Usuario')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
             <h3>Editar usuario</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos del usuario</h2>
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
                    {{Form::open(['action'=>['UserController@update',$usuario->id],'class'=>'form-horizontal form-label-left','method'=>'PATCH'])}}
                    <input type="hidden" name="idUser" value="{{$usuario->id}}">
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Nombre de usuario</label>
                        <div class="col-md-6">
                            <input class="form-control" name="name"  value="{{$usuario->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-md-4 control-label">E-mail</label>
                      <div class="col-md-6">
                          <input type="email" class="form-control" name="email" value="{{$usuario->email}}" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="rol" class="col-md-4 control-label">Rol <font color="red">*</font></label>
                      <div class="col-md-6">
                          <select class="form-control" required name="rol" id="rol">
                            <option value="">Seleccionar</option>
                            <option {{$usuario->rol->first()->name=='admin'?'selected':''}} value="admin">Administrador</option>
                            <option {{$usuario->rol->first()->name=='cajero'?'selected':''}} value="cajero">Cajero</option>
                          </select>
                      </div>
                  </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{url('usuarios')}}" class="btn btn-default">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
