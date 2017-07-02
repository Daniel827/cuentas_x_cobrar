@extends('layouts.adminpanel')
@section('titulo','Editar tipo de pago')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Editar Tipo de pago</h3>
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
    <form method="POST" action="http://localhost:8000/tipopagos/{{$tipopago->idTipoPago}}" accept-charset="UTF-8">
        <input name="_method" type="hidden" value="PATCH">
        {{ csrf_field() }}
        <input type="hidden" name="idTipoPago" value="{{$tipopago->idTipoPago}}">
        <div class="form-group">
            <label for="codigo" class="col-lg-2 control-label">Código <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="codigo" id="codigo" class="form-control" type="text" value="{{$tipopago->codigo}}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="nombre" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="nombre" id="nombre" class="form-control" type="text" value="{{$tipopago->nombre}}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="precio" class="col-lg-2 control-label">Referencia <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="referencia" id="referencia" class="form-control" type="text" value="{{$tipopago->referencia}}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion" class="col-lg-2 control-label">Descripcion <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="descripcion" id="descripcion" class="form-control" type="text" value="{{$tipopago->descripcion}}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="estado" class="col-lg-2 control-label">Estado<font color="red">*</font></label>
            <div class="col-lg-10">
                <select name="estado" id="estado" class="form-control" type="select" value="{{old('estado')}}" required>
                    <option value="A">Activo</option>
                    <option value="I">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input class="btn btn-primary" type="submit" value="Actualizar" />
            <a href="{{url()->previous()}}" class="btn btn-default" class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" >Cancelar</a>
        </div>
    </form>
</div>
@endsection
